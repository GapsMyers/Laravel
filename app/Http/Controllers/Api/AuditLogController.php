<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuditLogResource;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AuditLogController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = AuditLog::query()->latest();

        if ($request->filled('level')) {
            $query->where('level', $request->string('level')->toString());
        }

        if ($request->filled('category')) {
            $query->where('category', $request->string('category')->toString());
        }

        $logs = $query->paginate(20);

        return AuditLogResource::collection($logs)->additional([
            'message' => 'OK',
            'errors' => null,
        ]);
    }
}
