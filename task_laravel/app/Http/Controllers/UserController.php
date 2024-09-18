<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
 
    public function register(Request $request)
    {
       $validated = $request->validate([
           'name' => 'required|max:255',
           'email' =>'required|max:255|email|unique:users,email',
           'password' =>'required|min:6',
       ]);

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
      ]); // password =>Hash::make($request->passwprd);

      $token = $user->CreateToken('auth_token')->plainTextToken;

      return response()->json([
          'data'=>$user,
          'auth_token'=>$token,
          'token_type'=>'Bearer',
      ],201);
    }

    public  function login(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }

             $token = $user->createToken('my-app-token')->plainTextToken;



             return response()->json([
                'data'=>$user,
                'auth_token'=>$token,
                'token_type'=>'Bearer',
            ],201);
    }

}


