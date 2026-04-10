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
                return response()->json(['success' => false, 'message' => 'Email is invalid'], 401);
        }

        if (Auth::attempt($credentials)) {
            $request->user()->currentAccessToken()?->delete();
            $token = $request->user()->createToken('login')->plainTextToken;
            return response()->json(['success' => true, 'token' => $token,'user_id' => $request->user()->id]);
        }

        return response()->json(['success' => false, 'message' => 'Invalid credentials'], 401);
    }
}
