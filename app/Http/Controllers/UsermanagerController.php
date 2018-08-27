<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;

class UsermanagerController extends Controller
{
    public function index(User $user)
    {
        return view('admin.usermanager', [
            "users" => $user->all()
        ]);
    }
}
