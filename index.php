<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/autoload.php';
require __DIR__.'/app/config/routes.php';

// Route the request or return a 404 error if the route is not found
if ( !libs\router::route( $_GET['url'] ?? '/' ) ) {
    header('HTTP/1.0 404 Not Found');
    require __DIR__.'/404.html';
}