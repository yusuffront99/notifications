<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('pages.login');
    }    

    public function login_user(Request $request)
    {
        if(Auth::attempt([
            'email' => $request->input('email'), 
            'password' => $request->input('password')]))
        {
            $user = Auth()->user();
            return response()->json(['success' => 'successfully']);
        } else {
            return response()->json(['error' => 'went wrong']);
        }
    }

    // =======================

    public function register()
    {
        return view('pages.register');
    }    

    public function register_store(Request $request)
    {
        $user = User::where('email', $request['email'])->first();

        if($user) {
            return response()->json(['exists' => 'Email Already Exists']);
        } else {
            $user = new User;
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);
        }

        $user->save();
        return response()->json([
        
            'success' => 'User Registered Successfully'
        ]);

    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }
}
