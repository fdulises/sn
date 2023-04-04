<?php

namespace libs;

abstract class router {
    private static $routes = array();

    public static function addRoute($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public static function route($url) {
        foreach (self::$routes as $routeUrl => $handler) {
            // Check if the route URL contains parameters
            if (strpos($routeUrl, ':') !== false) {
                // Convert the route URL into a regular expression
                $routeRegex = preg_replace('/:([a-zA-Z0-9]+)/', '([^/]+)', $routeUrl);
                $routeRegex = '/^' . str_replace('/', '\/', $routeRegex) . '$/';

                // Check if the URL matches the regular expression
                if (preg_match($routeRegex, $url, $matches)) {
                    // Remove the first match, which is the entire URL
                    array_shift($matches);

                    // Call the appropriate controller and method with the route parameters
                    list($controllerName, $methodName) = explode('@', $handler);
                    $controller = new $controllerName();
                    return call_user_func_array(array($controller, $methodName), $matches);
                }
            } else {
                // If the route URL does not contain parameters, compare it directly to the URL
                if ($url === $routeUrl) {
                    // Call the appropriate controller and method
                    list($controllerName, $methodName) = explode('@', $handler);
                    $controller = new $controllerName();
                    return $controller->$methodName();
                }
            }
        }

        // Return false if the route is not found
        return false;
    }
}