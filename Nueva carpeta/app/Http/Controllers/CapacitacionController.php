<?php

namespace App\Http\Controllers;
use App\Models\User;

class CapacitacionController extends Controller
{   
    public function login()
    {
        dd("llego");
        return view('login');
    }
}