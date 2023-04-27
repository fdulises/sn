<?php

namespace libs;

class router {
    
    private static array $routes = [];

    public static function addRoute( string $url, string $controller, string $controller_method): void {
        self::$routes[$url] = [$controller, $controller_method];
    }

    public static function route( string $url ): bool {

        foreach ( self::$routes as $routeUrl => $handler ) {
            list( $controllerName, $methodName ) = $handler;

            // Check if the route URL contains parameters
            if ( strpos($routeUrl, ':') !== false ) {
                $routeRegex = preg_replace( '/:([a-zA-Z0-9]+)/', '([^/]+)', $routeUrl );
                $routeRegex = '/^' . str_replace( '/', '\/', $routeRegex ) . '$/';

                if ( preg_match( $routeRegex, $url, $matches ) ) {
                    // Remove the first match, which is the entire URL
                    array_shift( $matches );

                    $controller = new $controllerName();
                    return call_user_func_array([$controller, $methodName], $matches);
                }
            } else {
                // If the route URL does not contain parameters, compare it directly to the URL
                if ( $url === $routeUrl ) {
                    $controller = new $controllerName();
                    return $controller->$methodName();
                }
            }
        }

        return false;
    }
}