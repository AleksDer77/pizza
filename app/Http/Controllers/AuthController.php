<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\RegisterException;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * @throws RegisterException
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create($request->validated());
        if (!$user) {
            throw new RegisterException();
        }
        return response()->json([
            'message' => 'successful',
        ], 201);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->validated())) {
            return response()->json([
                'message' => 'Чет не то',
            ], 403);
        }

        $user = User::whereEmail($request->email)->first();

        $token = $user->createToken($user->email)->plainTextToken;

        return response()->json([
            'token' => $token,
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => 'success',
        ], 204);
    }
}
