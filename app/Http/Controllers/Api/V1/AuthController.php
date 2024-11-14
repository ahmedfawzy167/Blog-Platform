<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Users\UserResource;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    use ApiResponder;

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
        ]);
        return $this->created(new UserResource($user), "Registeration Successfully");
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (! $token = JWTAuth::attempt($credentials)) {
            return $this->unauthorized('Invalid Credentials');
        }
        $user = auth()->user();
        return $this->success([
            'user' => new UserResource($user),
            'token' => $token,
        ], 'Login Successfully');
    }

    public function logout()
    {
        $user = Auth()->user();
        Auth::logout();
        return $this->success([
            'user' => new UserResource($user),
        ], 'Logout Successfully');
    }
}
