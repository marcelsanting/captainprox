<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store()
    {
        $this->validate(request(), [
            "name" => "required|unique:users",
            "email" => "required|email",
            "password" => "required|confirmed"
        ]);

        $user = User::create(request(['name', 'email', 'password']));

        Auth::login($user);

        return redirect('admin');
    }
}
