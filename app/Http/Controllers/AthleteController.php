<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AthleteController extends Controller
{
    public function dashboard()
    {
        return view('athlete.dashboard');
    }
}
