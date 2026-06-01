<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class AuditLogController extends Controller
{
    public function index(Request $request)
    {
        $logs = AuditLog::query()->latest()->paginate(20);

        $logsByDate = $logs->getCollection()->groupBy(function (AuditLog $log) {
            return $log->created_at?->toDateString();
        });

        $stats = [
            'total' => AuditLog::query()->count(),
            'last_24h' => AuditLog::query()->where('created_at', '>=', now()->subDay())->count(),
            'sensitive' => AuditLog::query()->whereIn('level', ['warning', 'critical'])->count(),
            'alerts' => AuditLog::query()->where('level', 'critical')->count(),
        ];

        return view('admin.audit-log', [
            'logs' => $logs,
            'logsByDate' => $logsByDate,
            'stats' => $stats,
        ]);
    }

    public function export()
    {
        $logs = AuditLog::query()->latest()->get();

        return (new FastExcel($logs))->download('audit-report.xlsx', function ($log) {
            return [
                'ID' => $log->id,
                'Event Title' => $log->title,
                'Category' => strtoupper($log->category),
                'Level' => strtoupper($log->level),
                'Description' => $log->description,
                'Actor Name' => $log->actor_name ?? 'System',
                'IP Address' => $log->ip_address,
                'Time' => $log->created_at?->format('Y-m-d H:i:s'),
            ];
        });
    }
}
