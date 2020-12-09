<?php

/** @var \Laravel\Lumen\Routing\Router $router */


$router->get('/', function(){return "Welcome Porgrammer Nazmul Your API is Ready";});

$router->post('/registration', 'mainController@registration');

$router->post('/login', 'mainController@login');

$router->post('/verifytoken', ['middleware'=>'auth','uses'=>'mainController@verifytoken']);





