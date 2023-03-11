<?php

namespace models;

class users{

    public function __construct(){
        
    }

    public function create(){
        $code = $this->random_salt();
        $salt = $this->random_salt();
        $pass = 'contraseña';
        $pass = $this->encrypt_password($pass, $salt);

        return \lib\db::executeQuery(
            "INSERT INTO users(
                email, 
                nickname, 
                password, 
                password_salt, 
                activation_code
            ) VALUES(
                'uno@test.test', 
                'usertres', 
                '$pass', 
                '$salt', 
                '$code'
            )"
        );
    }

    public function deleteByID( int $id ): bool{
        return \lib\db::executeQuery("DELETE FROM users WHERE id = '$id'");
    }

    public function updatePassword( array $data ): bool{
        return \lib\db::executeQuery("UPDATE users SET 
            password = '{$data['password']}', 
            password_salt = '{$data['password_salt']}'
            WHERE id = '{$data['id']}'");
    }

    public function get(){
        return \lib\db::fetchQuery('SELECT * FROM users');
    }

    public function encrypt_password( string $pass, string $salt ){
        return hash('sha512', $pass.$salt);
    }

    public function random_salt(){
        return hash('sha512', uniqid().openssl_random_pseudo_bytes(32));
    }
}