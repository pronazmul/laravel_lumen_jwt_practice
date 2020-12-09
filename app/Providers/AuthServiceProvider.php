<?php

namespace App\Providers;

use App\Models\User;
use \Firebase\JWT\JWT;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->viaRequest('api', function ($request) {

            $jwt = $request->input('jwt_token');
            $key = env('JWT_KEY');

            // $decoded = JWT::decode($jwt, $key, array('HS256'));
            
            // if($decoded){return new User();}
            // else{return null;}

            try{
                $decoded = JWT::decode($jwt, $key, array('HS256'));
                return new User();
            }catch(\Exception $e){
                return null;
            }
        });
    }
}
