<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        return view('user.index');
    }

    public function details(){
        return view('user.details');
    }

    public function feeds(){
        return view('user.feeds');
    }
    public function detailsFeeds(){
        return view('user.details-feeds');
    }
    public function seeAll(){
        return view('user.see-all');
    }
}
