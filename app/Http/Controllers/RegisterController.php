<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //

    public function index()
    {
        return view('register');
    }


    public function store(Request $request)
    {
$request = request()->validate([
    'first_name' => 'required|min:3|max:255',
        'last_name' => 'required|min:3|max:255',
'email' => 'required|min:3|max:255|unique:users,email',
'password' => 'required|min:3|max:7',
]);

$request['password'] = bcrypt($request['password']);

$user = User::create($request);


       // Session::flash('success','Office successfully deleted.');
       // $session = session()->flash('Success', 'Account created successfully, please login!');
        session()->flash('success', 'Account created successfully!');
       // ddd($session);
        return redirect('/');

    }
}
