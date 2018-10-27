<?php

namespace App\Http\Controllers;

use Sentinel;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerForm()
    {
        return view('register.index');
    }

    public function register(Request $request)
    {
        $user = $request->all();

        if (Sentinel::registerAndActivate($user)) {
            return redirect()->route('produtos.index');
        }

        return redirect()->back(); 
    }
}
