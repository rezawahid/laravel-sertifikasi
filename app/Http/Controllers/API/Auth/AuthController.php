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

    public function login(Request $request){
        $validateData = $request->validate([
            'email' => 'email | required | unique:users',
            'password' => 'required | confirmed',
        ]);

        $login_detail = request(['email','password']);

        if(!Auth::attempt($login_detail)){
            return response()->json([
                'error' => 'login gagal. Cek lagi detail login'
            ], 401);
        }

        $user = $request->user();

        $tokenResult =$user->createToken('accessToken');
        $token = $tokenResult->token;
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accesToken,
            'token_id' => $token->id,
            'user_id' =>$user->id,
            'name' =>$user->name,
            'email' =>$user->email,
        ], 200);

    }
}
