<?php

use libs\router;

router::addRoute( '/', \controllers\ContentController::class, 'home' );

router::addRoute( 'login', \controllers\UserController::class, 'login' );
router::addRoute( 'register', \controllers\UserController::class, 'register' );
router::addRoute( 'config', \controllers\UserController::class, 'config' );
router::addRoute( 'user/:id', \controllers\UserController::class, 'home' );
router::addRoute( 'content/:id', \controllers\ContentController::class, 'single' );