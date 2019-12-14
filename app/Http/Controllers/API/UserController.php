<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    Public function getUser($id)
    {
        $user = DB::table('users')->first();
        return response()->json($user);  
    }

    Public function updateUser(Request $request, $id)
    {
       $request->validate([
            'first_name'             => 'sometimes|required|string|max:255',
            'last_name'              => 'sometimes|required|string|max:255',
            'email'                  => 'sometimes|required|string|email|max:255|unique:users',
            'dob'                    => 'sometimes|required|date'
        ]);
        DB::table('users')
            ->where('id', $id)
            ->update($request->input());
        return response()->json('done');
     
        
    }
}
