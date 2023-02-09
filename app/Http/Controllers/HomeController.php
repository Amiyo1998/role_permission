<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function redirectHome()
    {
        return redirect()->route('admin.login');
    }
    public function home()
    {
        return redirect()->route('admin.dashboard');
    }
}
