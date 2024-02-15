<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginproses(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            $user = Auth::user();

            if ($user->isAdmin()){
                return redirect('dashboard/index');
            }
            elseif ($user->isUser()){
                return redirect('dashboard/index');
            }
        }
        return redirect('auth/login');
    }
}
