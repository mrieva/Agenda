<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Website extends Controller
{
    function indexkepalasekolah()
    {
        return view('kepsek.indexkepalasekolah');
    }
}
