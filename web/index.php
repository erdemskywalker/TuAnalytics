<?php
require 'routes.php';  

$basePath = dirname($_SERVER['SCRIPT_NAME']);
$uri = trim(str_replace($basePath, '', $_SERVER['REQUEST_URI']), '/');
$uri = parse_url($uri, PHP_URL_PATH);


foreach ($routes as $route => $function) {
    $pattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([^/]+)', $route);
    $pattern = "@^" . $pattern . "$@"; 

    if (preg_match($pattern, $uri, $matches)) {
        array_shift($matches); 
        $_GET['params'] = $matches;
        call_user_func_array($function, $matches); 
        exit;
    }
}

http_response_code(404);
include 'views/404.php';
?>