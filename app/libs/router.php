<?php

namespace libs;

abstract class router {
    
    private static array $routes = [];

    public static function addRoute( string $url, string $controller, string $method): void {
        self::$routes[$url] = [$controller, $method];
    }

    public static function route( string $url ): bool {

        foreach ( self::$routes as $routeUrl => $handler ) {
            list( $controllerName, $methodName ) = $handler;

            // Check if the route URL contains parameters
            if ( strpos($routeUrl, ':') !== false ) {
                // Convert the route URL into a regular expression
                $routeRegex = preg_replace( '/:([a-zA-Z0-9]+)/', '([^/]+)', $routeUrl );
                $routeRegex = '/^' . str_replace( '/', '\/', $routeRegex ) . '$/';

                // Check if the URL matches the regular expression
                if ( preg_match( $routeRegex, $url, $matches ) ) {
                    var_dump($matches);
                    // Remove the first match, which is the entire URL
                    array_shift( $matches );

                    // Call the appropriate controller and method with the route parameters
                    $controller = new $controllerName();
                    return call_user_func_array([$controller, $methodName], $matches);
                }
            } else {
                // If the route URL does not contain parameters, compare it directly to the URL
                if ( $url === $routeUrl ) {
                    // Call the appropriate controller and method
                    $controller = new $controllerName();
                    return $controller->$methodName();
                }
            }
        }

        // Return false if the route is not found
        return false;

    }
}