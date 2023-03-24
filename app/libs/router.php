<?php

namespace libs;

abstract class router{

    static $routes = [];

    static function add( array $route ){
        $uri_parts = explode( '/', $route['uri'] );
        $uri_keys = array_keys($uri_parts);

        $part_first = $uri_parts[array_key_first($uri_parts)];

        self::$routes[$part_first] ??= [
            '#controller' => null,
        ];

        $base =& self::$routes[$part_first];

        $actual_part = 1;
        while( $actual_part < count($uri_parts) ){
            $actual_part_key = $uri_keys[$actual_part];
            $actual_part_value = $uri_parts[$actual_part_key];
            
            preg_match_all( '/\{(.*?)\}/', $actual_part_value, $matches);

            if( !$matches[1] ){
                $base[$actual_part_value] ??= [
                    '#controller' => null,
                ];
    
                $base =& $base[$actual_part_value];
            }else{
                $base['#child'] ??= [
                    '#controller' => null,
                    '#params' => $matches[1],
                ];

                $base =& $base['#child'];
            }
            
            $actual_part++;
        }

        $base['#controller'] = $route['controller'];
    }

    static function execute( string $url ){
        
        var_dump( self::$routes );

        $uri_parts = explode( '/', $url );


        $uri_parts = explode( '/', $url );
        $uri_keys = array_keys($uri_parts);

        $part_first = $uri_parts[array_key_first($uri_parts)];

        if( isset( self::$routes[$part_first] ) ) $base =& self::$routes[$part_first];
        else if( isset( self::$routes['#child'] ) ) $base =& self::$routes['#child'];
        else $base = null;

        if( $base ){

            $actual_part = 1;
            while( $actual_part < count($uri_parts) ){
                $actual_part_key = $uri_keys[$actual_part];
                $actual_part_value = $uri_parts[$actual_part_key];
                
                if( isset( $base[$actual_part_value] ) ) $base =& $base[$actual_part_value];
                else if( isset( $base['#child'] ) ) $base =& $base['#child'];
                else $base = null;

                $actual_part++;
            }
        }

        var_dump($base['#controller']);
    }
}