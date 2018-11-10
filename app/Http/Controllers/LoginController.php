<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $user = $request->all();

        if (Sentinel::authenticate($user)) {
            return redirect()->route('produtos.index');
        }

        return redirect()->back();
    }

    public function logout()
    {
        Sentinel::logout();
        return redirect()->route('login.form');
    }

}
