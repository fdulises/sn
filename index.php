<?php

require 'app/autoload.php';
require 'app/config/routes.php';

//libs\router::execute( $_GET['url'] );


preg_match_all( '/\{(.*?)\}/', '/{id}{id2}/{coment}', $matches);


var_dump($matches[1]);