<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request) {

        return view('user.register');
    }
    
    public function create(Request $request) {

        $credentials = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|confirmed'
        ]);

        $credentials['password'] = Hash::make($credentials['password']);

        User::create($credentials);

        return redirect('/success');
        // dd($credentials);
    }

    public function login(Request $request) {
        
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        if(Auth::attempt($credentials)) {

            return redirect('dashboard');
        }
    }
}
