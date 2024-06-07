<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('users.index', compact('users'));
    }
}
