<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthTokenRequest;
use App\Models\Karyawan;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function store(AuthTokenRequest $request): JsonResponse
    {
        $loginId = $request->string('email')->toString();
        $user = Karyawan::query()
            ->where('Email', $loginId)
            ->orWhere('Nama', $loginId)
            ->first();

        if ($user && ! $user->status) {
            return response()->json([
                'message' => 'Akun Anda telah dinonaktifkan.',
                'data' => null,
                'errors' => [
                    'email' => ['Akun Anda telah dinonaktifkan.'],
                ],
            ], 403);
        }

        if (! $user || ! Hash::check($request->string('password')->toString(), $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials.',
                'data' => null,
                'errors' => [
                    'email' => ['The provided credentials are incorrect.'],
                ],
            ], 422);
        }

        $token = $user->createToken($request->string('device_name')->toString());

        return response()->json([
            'message' => 'OK',
            'data' => [
                'token' => $token->plainTextToken,
                'token_type' => 'Bearer',
            ],
            'errors' => null,
        ]);
    }
}
