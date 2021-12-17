<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpCache\HttpCache;

class AuthController extends ApiController
{
    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $user = User::create($data);

        return $this->showOne($user, Response::HTTP_OK);
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        $user = User::where("email", $request->email)->first();

        if(!$user){
            return $this->errorResponse("Username atau password salah", Response::HTTP_UNAUTHORIZED);
        }else{
            if (Hash::check($request->password, $user->password)){
                $token = $user->createToken('token')->plainTextToken;

                $user->token = $token;

                return $this->showOne($user, Response::HTTP_OK);
            }else{
                return $this->errorResponse("Username atau password salah", Response::HTTP_UNAUTHORIZED);
            }
        }
    }
}
