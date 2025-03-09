<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    // Logout User
    public function logout(Request $request)
    {
        // Hapus semua token
        auth()->user()->tokens()->delete();

        // Hapus session
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return response()->json([
            'message' => 'Berhasil logout'
        ]);
    }

    // Cek Status Autentikasi
    public function me(Request $request)
    {
        $user = $request->user(); // Ambil data user yang sedang login

        return response()->json($user);
    }
}
