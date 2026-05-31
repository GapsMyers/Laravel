<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Http\Request;

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
}
