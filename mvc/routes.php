<?php
$router->get('', 'HomePage@home');
$router->get('search', 'HomePage@search');
$router->get('cart', 'CartController@getCart');
$router->get('addCart', 'CartController@addCart');
$router->get('increaseQuantity', 'CartController@increaseQuantity');
$router->get('delCart', 'CartController@delCart');
$router->get('formLogin', 'LoginController@index');

$router->post('checkLogin', 'LoginController@login');
$router->get('formRegis', 'LoginController@regis');
$router->post('checkRegis', 'LoginController@registration');
$router->get('logout', 'LoginController@logout');
$router->get('addBill', 'PayController@addBill');
$router->get('productInfo', 'ProductController@getProduct');
$router->get('getProductBrand', 'ProductController@getProductBrand');
$router->get('isHot', 'ProductController@getProductHot');
$router->get('isNew', 'ProductController@getProductNew');
$router->get('personal', 'LoginController@personal');
$router->get('UserManagement', 'AdminController@UserManagement');
$router->get('admin', 'AdminController@Admin');
$router->get('ProductManagement', 'AdminController@ProductManagement');
?>