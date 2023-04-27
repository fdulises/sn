<?php

use libs\router;

router::addRoute( '/', new \controllers\content\home );
router::addRoute( 'content/:id', new \controllers\content\single );


// router::addRoute( 'login', \controllers\UserController::class, 'login' );
// router::addRoute( 'register', \controllers\UserController::class, 'register' );
// router::addRoute( 'config', \controllers\UserController::class, 'config' );
// router::addRoute( 'user/:id', \controllers\UserController::class, 'home' );