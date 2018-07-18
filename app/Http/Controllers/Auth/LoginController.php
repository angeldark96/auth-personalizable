<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login()
    {
        // devolveremos un array de los datos que pasamos
        $credentials = $this->validate(request(),
            [
                $this->username() => 'email|required|string',
                'password' => 'required|string'
            ]
        );

       if(Auth::attempt($credentials))
       {
            return redirect()->route('dashboard');
       }

       return back()->withErrors([$this->username() => trans('auth.failed')])
                    ->withInput(request([$this->username()]));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function username()
    {
        return 'email';
    }
}
