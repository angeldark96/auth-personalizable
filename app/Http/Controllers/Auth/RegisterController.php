<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{

    use RegistersUsers;



    public function redirectPath()
    {
        return '/dashboard';
    }

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {

        return view('auth.register');
    }

    public function register()
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'confirmed|string|min:6|confirmed',

        ]);

        $user = User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => bcrypt(request('password')),
        ]);

        // Con el metodo guard() hace login automaticamente con el usuario que le estamos pasando a traves
        // de la variable
        $this->guard()->login($user);
        return redirect()->intended($this->redirectPath());

    }



}
