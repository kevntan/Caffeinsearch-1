<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function signup()
    {
        return view('login.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "username" => "required|min:3|unique:users",
            "email" => "required|unique:users",
            "password" => "required|min:8",
            "daerah" => "required",
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = new User;
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->daerah = $validatedData['daerah'];
        $user->role_id = 1;

        $save = $user->save();
        $user->createToken('auth_token')->plainTextToken;
        if ($save) {
            return redirect('/sign-in')->with('success', 'Registration successfull!, Please login');
        } else {
            return redirect('/sign-up')->with([
                'error' => 'Some problem has occurred, please try again'
            ]);
        }
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        if (Auth::attempt($credentials, true)) {
            if (Auth::user()->role_id == 1) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
            if (Auth::user()->role_id == 2) {
                $request->session()->regenerate();
                return redirect()->intended('/cafe');
            }
        }
        return back()->with('error', 'Login Failed!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
