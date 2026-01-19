<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
class AuthController extends Controller
{
     /**
     * @var \Tymon\JWTAuth\JWTGuard
     */
    protected $guard;
    
    public function __construct()
    {
        $this->guard = auth('api');
    }
    
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $token = $this->guard->attempt($credentials);
        if (!$token) {
            return response()->json([
                'message' => 'Unauthorized access!'
            ], 401);
        }

        return response()->json([
            'access_token' => $token,

            'expires_in' => $this->guard->factory()->getTTL() * 60
        ]);

    }

    public function refresh()
    {
        $refreshedToken = $this->guard->refresh();

        return response()->json([
            'refresh_token' => $refreshedToken,
            'expires_in' => $this->guard->factory()->getTTL() * 60
        ]);
    }

    public function me()
    {
        $user = auth('api')->user();

        return response()->json($user);
    }

    public function logout()
    {  
        $this->guard->logout(true);
        return response()->json(["message"=>"Logged out successfully"]);
    }
}