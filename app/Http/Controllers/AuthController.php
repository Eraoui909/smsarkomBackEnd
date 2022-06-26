<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\UploadController;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request): string
    {
        $request->validate([
            "fullname" => "required|max:100|unique:users,fullname",
            "email"     => "required|email|unique:users,email",
            "password"  => "required|min:8",
            "address"   => "max:255",
            "username"     => "required|unique:users,username",
            "phone"     => "max:20",
        ],
            [
                "fullname.required" => "le champ nom et Prenom est obligatoite",
                "fullname.max"      => "le champ nom et Prenom ne peut pas depasser 100 caracteres",
                "fullname.unique"   => "cet utilisateur existe deja dans la base de donnees",

                "username.required" => "le champ username est obligatoite",
                "username.max"      => "le champ username ne peut pas depasser 100 caracteres",
                "username.unique"   => "cet utilisateur existe deja dans la base de donnees",

                "email.required"     => "le champ Email est obligatoite",
                "email.email"        => "le champ Email doit respecter la structure des emails",
                "email.unique"       => "cet email existe deja",

                "password.required"  => "le mot de passe est obligatoite",
                "password.min"       => "le mot de passe ne peut pas etre compose de moins de 8 caracteres",

                "address.max"        => "l'Address ne peut pas depasser 255 caracteres",

                "Phone.max"          => "le champ Phone ne peut pas depasser 20 caracteres",
            ]);

        $user = new User();

        $user->fullname  = $request->input("fullname");
        $user->email      = $request->input("email");
        $user->password   = Hash::make($request->input("password"));
        $user->address    = $request->input("address");
        $user->username    = $request->input("username");
        $user->phone      = $request->input("Phone");
        $user->gender      = $request->input("gender");
        $user->type      = $request->input("type");
        $user->country      = $request->input("country");
        $user->city      = $request->input("city");
        $user->picture    = UploadController::userPic($request);

        $user->save();
        return "succes";
    }
}
