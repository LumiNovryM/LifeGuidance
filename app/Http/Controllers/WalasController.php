<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalasController extends Controller
{
    public function home_walas()
    {
        return view('walas.walas');
    }
}
