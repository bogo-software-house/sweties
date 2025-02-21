<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{


     /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login');
    }

    /**
     * Display the login view.
     */
  // Fungsi untuk login
  public function store(Request $request)
  {
      $credentials = $request->validate([
          'email' => ['required', 'email'],
          'password' => ['required'],
      ]);

      if (Auth::attempt($credentials)) {
          $user = Auth::user();
          $token = $user->createToken('authToken')->plainTextToken; // Generate token untuk API auth

          return response()->json([
              'message' => 'Login successful',
              'user' => $user,
              'token' => $token
          ]);
      }

      return response()->json([
          'message' => 'Invalid credentials'
      ], 401);
  }

  // Fungsi untuk logout
  public function destroy(Request $request)
  {
      $user = $request->user();
      $user->tokens()->delete(); // Hapus semua token API pengguna

      return response()->json([
          'message' => 'Logged out successfully'
      ]);
  }
}
