<?php

namespace controllers\content;

class single implements \libs\controllerAdapter {

    public function start( array $args ): bool{

        $ContentModel = new \models\Contents;
        $content_data = $ContentModel->getByID( $args['id'] );

        if( $content_data ){
            $ContentView = new \views\content\single;
            $ContentView->single( $content_data );
            return true;
        }

        return false;

    }

}