<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function checkLogin(Request $request) {
//        dd($request->all());
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            if (Auth::user()->role == "admin") {
                return redirect()->route('home');
            }
            return redirect()->route('regular_home');
        }
        return redirect()->route('login')->with('error', 'Email or password is incorrect!');
    }

    public function register() {
        return view('register');
    }

    public function registerUser(Request $request) {
//        dd($request->all());
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'username' => 'required|max:255'
        ]);

        $users = User::all();
        foreach ($users as $user) {
            if ($user->email == $request->email) {
//                dd('Email already exists!');
                return redirect()->route('register')->with('error', 'Email already exists!');
            }
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->username = $request->username;
        $user->role = 'regular';
        $user->save();
        return redirect()->route('login');
    }

    public function regularHome() {
        return view('regular_home');
    }

    public function home() {
        return view('home');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
