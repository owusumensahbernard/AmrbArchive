<?php

namespace App\Http\Controllers;



class SessionsController extends Controller
{
    //

    public function destroy()
    {
      // ddd('log the user out');

         auth()->logout();
         return redirect('/')->with('success', 'Goodbye!');
    }
}
