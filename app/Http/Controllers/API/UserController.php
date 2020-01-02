<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUser($id)
    {
        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        return response()->json($user);  
    }
   

    public function updateUser(Request $request, $id)
    {
       $request->validate([
            'email' => 'sometimes|required|string|email|max:255|unique:users',
        ]);
        DB::table('users')
            ->where('id', $id)
            ->update($request->input());
        return response()->json('done');
     
        
    }
}
