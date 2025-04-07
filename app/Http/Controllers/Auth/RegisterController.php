<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RegisterService;
use Illuminate\Http\RedirectResponse;


class RegisterController extends Controller
{   
    protected $RegisterService ;

    public function __construct(RegisterService $RegisterService){
        $this->RegisterService = $RegisterService;
    }

    public function ShowRegisterForm(){
        return view('auth.register');
    }
     
    public function registrationUser(Request $request) : RedirectResponse {
        // call the service 
        $result = $this->RegisterService->registerUser($request->all());

        // handle sucess request
        if ($result['success']){
            return redirect()->route('login')->with('sucess', 'user created sucessfully');
        }

        return redirect()->route('register')->withErrors($result['errors']);
    }
}