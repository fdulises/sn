<?php

namespace controllers;

class ContentController{
    public function index(){
        (new \views\ContentView)->home( (new \models\Contents)->get() );

        return true;
    }
}