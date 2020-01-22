<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the User Resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function gettingUser()
    {
        $users = User::latest()->paginate(10);
        return view('admins.page.users', compact('users'));
    }
}
