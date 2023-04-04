<?php

use libs\router;

router::addRoute('/', '\controllers\ContentController@index');

router::addRoute('singin', '\controllers\UserController@login');
router::addRoute('singup', '\controllers\UserController@register');
router::addRoute('config', '\controllers\UserController@config');
router::addRoute('user/:id', '\controllers\UserController@show');