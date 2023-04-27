<?php

namespace controllers;

class ContentController{

    private $ContentView;
    private $ContentModel;

    public function __construct(){

        $this->ContentView = new \views\ContentView;
        $this->ContentModel = new \models\Contents;
    }

    public function home(){

        $content_list_data = $this->ContentModel->get();
        $this->ContentView->home( $content_list_data );

        return true;
    }

    public function single( $id ){

        $content_data = $this->ContentModel->getByID( $id );
        $this->ContentView->single( $content_data );

        return true;
    }
}