<?php

namespace App\Http\Controllers;

// use Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     if ($this->middleware('auth')) {
    //         return redirect('/');
    //     }
    // }

    public function index()
    {
        return view('login/login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))) {
            return redirect('/');
        } else return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
