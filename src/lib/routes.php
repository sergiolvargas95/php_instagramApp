<?php

use Redhood\InstagramApp\controllers\Signup;

require 'vendor/autoload.php';

$router = new \Bramus\Router\Router();

session_start();

//load .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
$dotenv->load();

$router->get('/', function() {
    echo "Inicio";
});

$router->get('/login', function(){
    echo "Login";
});

$router->get('/auth', function(){
    echo "";
});

$router->get('/signup', function(){
    $controller = new Signup;
    $controller->render('signup/index');
});

// $router->post('/register', function(){});

// $router->get('/home', function(){});

// $router->post('/publish', function(){});

// $router->get('/profile', function(){});

// $router->post('/addLike', function(){});

// $router->post('/signout', function(){});

// $router->get('/profile/{username}', function($username){});

$router->run();