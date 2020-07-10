<?php
$router->get('', 'HomePage@home');
$router->get('search', 'HomePage@search');
$router->get('cart', 'CartController@getCart');
$router->get('addCart', 'CartController@addCart');
$router->get('formLogin', 'LoginController@index');
$router->post('checkLogin', 'LoginController@login');
$router->get('formRegis', 'LoginController@regis');
$router->post('checkRegis', 'LoginController@registration');
$router->get('logout', 'LoginController@logout');

?>