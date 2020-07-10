<?php
session_start();
require_once "core/Request.php";
require_once "core/Router.php";

function view($name, $data = []){
    extract($data);
    return require "views/{$name}.php";
}
function redirect($path = null){
    header("Location:/{$path}");
}
Router::load('routes.php')->direct(Request::uri(), Request::method());
