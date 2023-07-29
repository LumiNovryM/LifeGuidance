<?php

namespace App\Http\Controllers;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indonesia()
    {
        return view('layout.page.lang.id.landingpage');
    }

    public function japanese()
    {
        $lang = new ('id');
        
    }
}
