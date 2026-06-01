<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Karyawan;
use App\Models\Request as PurchaseRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class KaryawanController extends Controller
{
    /**
     * Display dashboard page.
     */
    public function dashboard()
    {
        $pendingRequests = PurchaseRequest::query()
            ->where('status', 'pending')
            ->count();

        $approvedRequests = PurchaseRequest::query()
            ->where('status', 'approved')
            ->count();

        $activeOrders = PurchaseRequest::query()
            ->whereIn('status', ['approved', 'partial'])
            ->count();

        $lowStock = Barang::query()
            ->where('stok', '<', 10)
            ->count();

        $chartData = $this->getChartData('monthly');

        return view('admin.dashboard', [
            'pendingRequests' => $pendingRequests,
            'approvedRequests' => $approvedRequests,
            'activeOrders' => $activeOrders,
            'lowStock' => $lowStock,
            'chartData' => $chartData,
        ]);
    }

    /**
     * Return chart data as JSON for AJAX period switching.
     */
    public function chartData(Request $request): JsonResponse
    {
        $period = $request->input('period', 'monthly');

        if (! in_array($period, ['daily', 'weekly', 'monthly'])) {
            $period = 'monthly';
        }

        return response()->json($this->getChartData($period));
    }

    /**
     * Build chart data grouped by the given period.
     *
     * @return array{labels: list<string>, pending: list<int>, approved: list<int>, rejected: list<int>}
     */
    private function getChartData(string $period): array
    {
        $now = Carbon::now();

        $driver = DB::connection()->getDriverName();
        $dateFormat = match ($driver) {
            'sqlite' => match ($period) {
                'daily' => "strftime('%Y-%m-%d', created_at)",
                'weekly' => "strftime('%Y-%W', created_at)",
                'monthly' => "strftime('%Y-%m', created_at)",
            },
            'oracle' => match ($period) {
                'daily' => "TO_CHAR(created_at, 'YYYY-MM-DD')",
                'weekly' => "TO_CHAR(created_at, 'IYYY-IW')",
                'monthly' => "TO_CHAR(created_at, 'YYYY-MM')",
            },
            default => match ($period) {
                'daily' => "DATE_FORMAT(created_at, '%Y-%m-%d')",
                'weekly' => "DATE_FORMAT(created_at, '%Y-%u')",
                'monthly' => "DATE_FORMAT(created_at, '%Y-%m')",
            },
        };

        $startDate = match ($period) {
            'daily' => $now->copy()->subDays(13)->startOfDay(),
            'weekly' => $now->copy()->subWeeks(11)->startOfWeek(),
            'monthly' => $now->copy()->subMonths(5)->startOfMonth(),
        };

        $rows = PurchaseRequest::query()
            ->select(DB::raw("{$dateFormat} as period_key"), 'status', DB::raw('COUNT(*) as total'))
            ->where('created_at', '>=', $startDate)
            ->groupBy(DB::raw($dateFormat), 'status')
            ->orderBy(DB::raw($dateFormat))
            ->get();

        $periods = $this->generatePeriodKeys($period, $startDate, $now);

        $pending = array_fill_keys($periods, 0);
        $approved = array_fill_keys($periods, 0);
        $rejected = array_fill_keys($periods, 0);

        foreach ($rows as $row) {
            $key = $row->period_key;
            if (! isset($pending[$key])) {
                continue;
            }

            match ($row->status) {
                'pending' => $pending[$key] = $row->total,
                'approved' => $approved[$key] = $row->total,
                'rejected' => $rejected[$key] = $row->total,
                default => null,
            };
        }

        $labels = array_map(fn (string $key) => $this->formatLabel($key, $period), $periods);

        return [
            'labels' => array_values($labels),
            'pending' => array_values($pending),
            'approved' => array_values($approved),
            'rejected' => array_values($rejected),
        ];
    }

    /**
     * Generate an ordered list of period keys between start and now.
     *
     * @return list<string>
     */
    private function generatePeriodKeys(string $period, Carbon $start, Carbon $end): array
    {
        $keys = [];
        $cursor = $start->copy();

        while ($cursor->lte($end)) {
            $keys[] = match ($period) {
                'daily' => $cursor->format('Y-m-d'),
                'weekly' => $cursor->format('Y-W'),
                'monthly' => $cursor->format('Y-m'),
            };

            $cursor = match ($period) {
                'daily' => $cursor->addDay(),
                'weekly' => $cursor->addWeek(),
                'monthly' => $cursor->addMonth(),
            };
        }

        return $keys;
    }

    /**
     * Format a period key into a human-readable label.
     */
    private function formatLabel(string $key, string $period): string
    {
        return match ($period) {
            'daily' => Carbon::parse($key)->format('d M'),
            'weekly' => 'W'.explode('-', $key)[1],
            'monthly' => Carbon::parse($key.'-01')->translatedFormat('M Y'),
        };
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = Karyawan::query()->latest()->get();

        return view('admin.karyawan', [
            'karyawans' => $karyawans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nama' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'email', 'max:255', Rule::unique('karyawans', 'Email')],
            'Role' => ['required', 'string', Rule::in(['Admin', 'Karyawan', 'admin', 'karyawan'])],
            'password' => ['required', 'string', 'min:8'],
            'status' => ['required', 'boolean'],
        ]);

        Karyawan::query()->create($validated);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $validated = $request->validate([
            'Nama' => ['required', 'string', 'max:255'],
            'Email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('karyawans', 'Email')->ignore($karyawan->getKey()),
            ],
            'Role' => ['required', 'string', Rule::in(['Admin', 'Karyawan', 'admin', 'karyawan'])],
            'password' => ['nullable', 'string', 'min:8'],
            'status' => ['required', 'boolean'],
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $karyawan->update($validated);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
    }
}
