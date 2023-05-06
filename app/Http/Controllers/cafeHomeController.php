<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class cafeHomeController extends Controller
{
    public function index()
    {
        $cafe = DB::table('cafes')
            ->where('user_id', Auth::user()->id)
            ->get();
        $cafes =  $cafe->count();
        if ($cafes == 0) {
            DB::table('cafes')->insert([
                'nama' => 'Cafe ' . Auth::user()->username,
                'lokasi' => Auth::user()->daerah,
                'user_id' => Auth::user()->id,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ]);
        }

        return view('cafe.index', ['cafe' => $cafe[0]]);
    }
    public function edit()
    {
        return view('cafe.edit');
    }
}
