<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
        }catch (ValidationException $e) {
            if($e->status === 422)
                return response()->json(['success' => false, 'message' => 'Email or password is invalid'], 401);
        }

        if (Auth::attempt($credentials)) {
            $request->user()->tokens()->delete();
            $token = $request->user()->createToken('login')->plainTextToken;
            return response()->json(['success' => true, 'token' => $token,'user' => $request->user()]);
        }
        //133|tSG72tqRfjolOB6W1VqvOKxicTZvNkB1sRvzxi0sbec9781b
        return response()->json(['success' => false, 'message' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        $request->user()->tokens()->delete();
        return response()->json(['success' => true, 'message' => 'user logged out']);;
    }
}
