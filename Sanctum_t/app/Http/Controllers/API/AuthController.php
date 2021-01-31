<?php
namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required'    
        ]);

        $user = User::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        return $user;
    }

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