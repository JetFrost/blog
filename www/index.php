<?php

try {
    function autoloader(string $className){
        require_once __DIR__.'/../src/'.str_replace('\\', '/', $className).'.php';
    }

    spl_autoload_register('autoloader');

    $route = $_GET['route'] ?? '';
    $routes = require_once __DIR__.'/../src/routes.php';

    $isRouteFound = false;
    foreach ($routes as $pattern => $controllerAndAction) {
        preg_match($pattern, $route, $matches);
        if (!empty($matches)){
            $isRouteFound = true;
            break;
        }
    }

    if (!$isRouteFound){
        throw new \MyProject\Exceptions\NotFoundException();
    }

    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];

    unset($matches[0]);

    $controller = new $controllerName();
    $controller->$actionName(...$matches);

} catch (\MyProject\Exceptions\DbException $e) {
    $view = new \MyProject\View\View(__DIR__."/../src/templates/errors");
    $view->renderHTML('500.php', ['error' => $e->getMessage()], 500);
} catch (\MyProject\Exceptions\NotFoundException $e){
    $view = new \MyProject\View\View(__DIR__."/../src/templates/errors");
    $view->renderHTML('404.php', ['error' => $e->getMessage()], 404);
} catch (\MyProject\Exceptions\UnauthorizedException $e) {
    $view = new \MyProject\View\View(__DIR__.'/../src/templates/errors');
    $view->renderHTML('401.php', ['error' => $e->getMessage()], 401);
} catch (\MyProject\Exceptions\ForbiddenException $e) {
    $view = new \MyProject\View\View(__DIR__.'/../src/templates/errors');
    $view->renderHTML('403.php', ['error' => $e->getMessage()], 403);
}