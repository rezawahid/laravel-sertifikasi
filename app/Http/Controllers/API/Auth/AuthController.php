<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:25',
            'email' => 'email | required | unique:users',
            'password' => 'required | confirmed',
        ]);

        //create user
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bycript($request->password),
        ]);

        $user->save;

        return response()->json($user, 201);
    }
}
