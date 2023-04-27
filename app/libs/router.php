<?php

namespace libs;

class router {
    
    private static array $routes = [];

    public static function addRoute( string $request_url, controllerAdapter $controller ): void {
        self::$routes[$request_url] = $controller;
    }

    public static function route( string $request_url ): bool {

        foreach ( self::$routes as $routeUrl => $controller_name ) {

            // Check if the route URL contains parameters
            if ( strpos($routeUrl, ':') !== false ) {
                $routeRegex = preg_replace( '/:([a-zA-Z0-9]+)/', '([^/]+)', $routeUrl );
                $routeRegex = '/^' . str_replace( '/', '\/', $routeRegex ) . '$/';
                
                if ( preg_match( $routeRegex, $request_url, $url_params ) ) {
                    // Remove the first match, which is the entire URL
                    array_shift( $url_params );

                    preg_match_all('/:([a-zA-Z0-9]+)/', $routeUrl, $param_names);
                    $url_params = array_combine($param_names[1], $url_params);

                    $controller = new $controller_name();
                    return $controller->start( $url_params );
                }
            } else {
                // If the route URL does not contain parameters, compare it directly to the URL
                if ( $request_url === $routeUrl ) {
                    $controller = new $controller_name();
                    return $controller->start([]);
                }
            }
        }

        return false;
    }
}