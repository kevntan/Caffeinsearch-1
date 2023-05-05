<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cafeHomeController extends Controller
{
    public function index(){
        return view('cafe.index');
    }
    public function edit(){
        return view('cafe.edit');
    }
}
