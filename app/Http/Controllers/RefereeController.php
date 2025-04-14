<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RefereeController extends Controller
{
    public function dashboard()
    {
        return view('referee.dashboard');
    }
}
