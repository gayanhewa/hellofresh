<?php

//Home Page
$router->get('homepage', '/', 'HelloFresh\Controllers\HomeController', 'index');

// Login Page
$router->get('logout.get', '/logout', 'HelloFresh\Controllers\AuthController', 'logout' );
$router->get('login.get', '/login', 'HelloFresh\Controllers\AuthController', 'getLogin' );
$router->post('login.post.', '/login', 'HelloFresh\Controllers\AuthController', 'postLogin' );

// Login Page
$router->get('register.get', '/register', 'HelloFresh\Controllers\UserController', 'getRegister' );
$router->post('register.post.', '/register', 'HelloFresh\Controllers\UserController', 'postRegister' );

// Search Page
$router->get('search.get', '/search', 'HelloFresh\Controllers\SearchController', 'getSearch');
$router->post('search.post', '/search', 'HelloFresh\Controllers\SearchController', 'postSearch');

