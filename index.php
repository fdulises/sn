<?php

require 'app/autoload.php';
require 'app/config/routes.php';



\libs\db::connect();



// Route the request
$_GET['url'] ??= '/';
if (!libs\router::route($_GET['url'])) {
    // Return a 404 error if the route is not found
    header('HTTP/1.0 404 Not Found');
    require '404.html';
}
