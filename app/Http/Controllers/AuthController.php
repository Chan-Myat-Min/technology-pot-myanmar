<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
       // dd("hit");
       return view('register.create');
    }
    public function login()
    {
        return view('login');
    }
}
