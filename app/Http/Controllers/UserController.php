<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Index(){
        return view('frontend.index');
    }

    public function Route(){
        return view('frontend.route');
    }

    public function BusHiring(){
        return view('frontend.busHiring');
    }

    public function AboutUs(){
        return view('frontend.aboutUs');
    }
}
