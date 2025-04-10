<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle user login and issue a Sanctum token.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',  // Ensure email is valid
            'password' => 'required|string',  // Ensure password is provided
        ]);

        // Attempt to authenticate using the provided credentials
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // If authentication is successful, get the authenticated user
            $user = Auth::user();

            // Create a token for the user using Laravel Sanctum
            // The "Frontend App" name is a way to identify which app generated this token
            $token = $user->createToken('Frontend App')->plainTextToken;

            // Return the token to the frontend as JSON response
            return response()->json(['token' => $token]);
        }

        // If authentication fails, return an error response
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
