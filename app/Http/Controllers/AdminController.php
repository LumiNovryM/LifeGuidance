<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home_admin()
    {
        return view('admin.home_admin');
    }
}
