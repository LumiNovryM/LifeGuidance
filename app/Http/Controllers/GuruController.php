<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function home_guru(){
        return view('guru.guru',[
            "title" => "Dashboard"
        ]);
    }
}
