<?php

namespace App\Http\Controllers\Web\Admin;


use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {

        $users = User::orderBy('created_at', 'desc')->with(['role','city'])->get();


        return view('admin.user.index', compact('users'));
    }
}
