<?php namespace lantern\router;

function execute($url)
{
    $routeParams = getRequestedRouteParams($url);

    if (empty($routeParams)) {
        loadTemplate('system/404.php', []);
        die();
    }

    $responseData = executePageFunction($routeParams['function']);

    return $responseData;
}

function getRequestedRouteParams($url)
{
    $routes = parse_ini_file('./config/router.ini', true);

    if (!in_array($url, array_keys($routes))) {
        return null;
    }

    return $routes[$url];
}

function executePageFunction($function)
{
    if (!function_exists($function)) {
        include_once str_replace('\\', DIRECTORY_SEPARATOR, ".{$function}.php");
    }

    return $function();
}

