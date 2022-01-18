<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }

//    public function store(request $request)
//    {
//
//    }


    public function store(request $request)
    {

        $request = request()->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|',
        ]);

        if(auth()->attempt($request))
        {
            session()->regenerate();
            return redirect('/loan')->with('success', 'welcome!');
        }

        // Auth Failure
        return back()
            ->withInput()
            ->withErrors(['email'=> 'Your provided credentials could not be verified'])
            ->withErrors(['password'=> 'Incorrect password']);

    }

}
