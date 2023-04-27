<?php

namespace models;

class mainModel{
    public function __construct(){
        if( is_null(\libs\db::$dbh) ) \libs\db::connect();
    }
}