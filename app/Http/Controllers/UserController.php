<?php

namespace App\Http\Controllers;

use App\Models\Bus;
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
        $all_bus = Bus::all();
        return view('frontend.busHiring')->with('all_bus', $all_bus);
    }

    public function AboutUs(){
        return view('frontend.aboutUs');
    }
}
