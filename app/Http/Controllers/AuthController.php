<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){

      $this->validate($request, [
        'email' => 'required',
        'password' => 'required',
      ]);

      if (\Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
          // Authentication passed...
          return redirect()->intended('dashboard');
      }else{
        return back()->with('error', 'Login Credentials wrong');
      }
    }

    public function logout(){
      \Auth::logout();
      return redirect()->route('make_request');
    }
}
