<?php
session_start();

$url = isset($_GET['url']) ? $_GET['url'] : 'home';

$urlParts = explode('/',rtrim($url,'/'));

$controllerName = ucfirst($urlParts[0]) . 'Controller';

$controllerFile = 'app/controllers/' . $controllerName . '.php';

if(file_exists($controllerFile))
{
    require_once($controllerFile);
    $controller = new $controllerName();
}
else{
    echo "not found";
}


if(isset($urlParts[1]))
{
    $method = $urlParts[1];
}
else{
    $method = 'index';
}


if(method_exists($controller,$method)){
    call_user_func_array([$controller,$method],$urlParts);
}