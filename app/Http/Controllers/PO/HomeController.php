<?php

namespace App\Http\Controllers\PO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('po/home/index');
    }
}
