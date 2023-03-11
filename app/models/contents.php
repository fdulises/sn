<?php

namespace models;

class contents{

    public function __construct(){
        
    }

    public function create( array $data ){

        return \lib\db::executeQuery("INSERT INTO contents(
                user_id,
                title,
                body,
                category_id,
                interactions,
                audience
            ) VALUES(
                :user_id,
                :title,
                :body,
                :category_id,
                :interactions,
                :audience
            )", $data);
    }

    public function deleteByID( int $id ): bool{
        return \lib\db::executeQuery("DELETE FROM contents WHERE id = '$id'");
    }

    public function get(){
        return \lib\db::fetchQuery('SELECT * FROM contents');
    }

    public function getByID( int $id ){
        return \lib\db::fetchFirst("SELECT * FROM contents WHERE id = '$id'");
    }
}