<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('home');
    }

    public function change_password()
    {
        return view('changePassword');
    }
}
