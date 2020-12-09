<?php

namespace App\Http\Controllers;
use \Firebase\JWT\JWT;
use App\Models\registration_model;
use Illuminate\Http\Request;

// use App\Models\access_token_model;
// use App\Models\phone_book_model;

class mainController extends Controller
{
    public function registration(Request $request){
        $name = $request->input('name');
        $username = $request->input('username');
        $password = $request->input('password');

        $check = registration_model::where('username',$username)->count();
        if($check != 0){
            return "Username Already Exist";
        }else{
            $result = registration_model::insert(['name'=>$name, 'username'=>$username, 'password'=>$password]);
            if($result){return "Resistration Inserted Successfully";}
        }
    }


    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        
        $check = registration_model::where(['username'=>$username, 'password'=>$password])->count();

        if($check != 0){

            $key = env('JWT_KEY');
            $payload = array(
                "site" => "http://pronazmul.com",
                "username" => $username,
                "password" => $password,
                "iat" => time(),
                "exp" => time()+30
            );
            $jwt = JWT::encode($payload, $key);

            return response()->json(["jwt_token"=>$jwt]);
        }else{
            return "login Failed";
        }
    }


    public function verifytoken(){
        return "Your Token is Verified";
    }
    
}
