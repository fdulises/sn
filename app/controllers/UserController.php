<?php

namespace controllers;

class UserController {

    public function show( $id ) {
        echo 'User ' . $id;
        return true;
    }

    public function login() {
        echo 'Login form';
        return true;
    }

    public function register() {
        echo 'Register form';
        return true;
    }

    public function config() {
        echo 'Config form';
        return true;
    }

}