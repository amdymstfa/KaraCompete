<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RegisterService;

class RegisterController extends Controller
{
    private $RegisterService;

    public function __construct(RegisterService $registerService)
    {
        $this->RegisterService = $registerService;
    }

    public function ShowRegisterForm(){
        return view('auth.register');
    }

    public function registrationUser(Request $request) 
    {
        $result = $this->RegisterService->registerUser($request->all());
        
        if ($result['success']) {
            return response()->json([
                'message' => 'User created successfully',
                
            ]);
        }

        return response()->json(['errors' => $result['errors']], 400); 
    }
}
