<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        if (!\Sentinel::inRole('admin')) {
            abort(401, 'Não autorizado!');
        }
        return view('users.create');
    }

    public function store(Request $request)
    {
        return $request->all();
    }
}
