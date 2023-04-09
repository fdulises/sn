<?php

use libs\router;

router::addRoute( '/', \controllers\ContentController::class, 'index' );

router::addRoute( 'singin', \controllers\UserController::class, 'login' );
router::addRoute( 'singup', \controllers\UserController::class, 'register' );
router::addRoute( 'config', \controllers\UserController::class, 'config' );
router::addRoute( 'user/:id', \controllers\UserController::class, 'show' );