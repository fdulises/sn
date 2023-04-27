<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/autoload.php';
require __DIR__.'/app/config/routes.php';

\libs\db::connect();

// Route the request
if ( !libs\router::route( $_GET['url'] ?? '/' ) ) {
    // Return a 404 error if the route is not found
    header('HTTP/1.0 404 Not Found');
    require __DIR__.'404.html';
}