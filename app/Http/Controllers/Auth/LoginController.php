<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\LoginService;


class LoginController extends Controller
{
    
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    // Show login form view
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login attempt
    public function authenticate(Request $request)
    {
        
        // Validate login data
        $result = $this->loginService->validateLoginData($request->all());

        if (!$result['success']) {
            return response()->json($result, 422);
        }

        // Attempt login
        $loginResult = $this->loginService->attemptLogin($request->only('email', 'password'));

        if (!$loginResult['success']) {
            return response()->json($loginResult, 401);
        }

        // Authenticate the user
        Auth::login($loginResult['user']);

        // Return a JSON response with the redirect URL based on the role
        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        if ($user->isAdmin()) {
            return response()->json([
                'redirect' => route('admin'),
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ]);
        }

        if ($user->isReferee()) {
            return response()->json([
                'redirect' => route('referee'),
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ]);
        }

        // Default redirect for client
        return response()->json([
            'redirect' => route('athlete'),
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }
}