<?php

namespace models;

class contents{

    public function __construct(){
        
    }

    public function create( array $data ){

        return \libs\db::executeQuery("INSERT INTO contents(
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
        return \libs\db::executeQuery("DELETE FROM contents WHERE id = '$id'");
    }

    public function get(){
        return \libs\db::fetchQuery('SELECT * FROM contents');
    }

    public function getByID( int $id ){
        return \libs\db::fetchFirst("SELECT * FROM contents WHERE id = '$id'");
    }
}