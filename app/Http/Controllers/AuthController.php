<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\UploadController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index(Request  $request){

        if(!auth()->user()->tokenCan('admin')){
            abort(403,'UnAuthorized');
        }
        return response()->json("hello");
    }

    public function register(RegisterRequest $request): UserResource
    {

        $newUser = User::create(
            [
                "fullname"  => $request->input("fullname"),
                "email"      => $request->input("email"),
                "password"   => Hash::make($request->input("password")),
                "address"    => $request->input("address"),
                "username"    => $request->input("username"),
                "phone"      => $request->input("Phone"),
                "gender"      => $request->input("gender"),
                "type"      => $request->input("type"),
                "country"      => $request->input("country"),
                "city"      => $request->input("city"),
                "picture"    => UploadController::userPic($request)
            ]
        );
        return new UserResource($newUser);
    }

    public function login(LoginRequest $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'error_login' => ['These credentials do not match our records.']
            ], 422);
        }

        $token = $user->createToken('smsarkom-token',["admin"])->plainTextToken;

        $user = new UserResource($user);

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }


    public function logout(Request $request){

        auth()->user()->tokens()->delete();
    }
}
