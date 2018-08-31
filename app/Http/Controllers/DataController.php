<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DataController extends Controller
{
    public function userdata()
    {
        return datatables()->of(User::all())->toJson();
    }
}
