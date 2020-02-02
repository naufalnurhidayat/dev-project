<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateKaryawan extends Controller
{
    public function index() {
        return view('createkaryawan/createkaryawan');
    }

    public function login() {
        return view('createkaryawan/login');
    }
}
