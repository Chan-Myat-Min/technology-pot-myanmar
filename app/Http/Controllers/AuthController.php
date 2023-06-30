<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register()
    {
        // dd("hit");
        return view('register.create');
    }

    public function registerStore()
    {
        //   dd(request()->all());
        $clearData = request()->validate([
            'name' => ['required', 'min:5', 'max:15'],
            'username' => ['required', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required']
        ], [
            'username.unique' => 'Hey! username already taken here',
            'email.required' => 'email needed'
        ]);
        $user = User::create($clearData);
        //login

        auth()->login($user);
        return redirect('/')->with('success', 'Welcome Back' . $user->name);
    }

    public function login()
    {
        return view('login.login');
    }

    public function loginStore()
    {
        $clearData = request()->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' => ['required']
        ]);
        ///????
        if (auth()->attempt($clearData)) {
            return redirect('/')->with('success', 'Welcome Back' . auth()->user()->name);
        } else {
            return back()->withErrors(['email' => 'Credentials something wrong']);
        }
    }




    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
