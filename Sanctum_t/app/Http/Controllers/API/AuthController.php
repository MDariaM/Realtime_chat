<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json(['Success.']);
        }

        return response()->json(['Unauthorized.'], Response::HTTP_UNAUTHORIZED);
    }

    public function user(Request $request)
    {
        $user = $request->user();
       

        return $user;
    }

    public function logout(Request $request)
    {
        auth('web')->logout();

        return response()->json(['Success.']);
    }
}