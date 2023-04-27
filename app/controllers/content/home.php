<?php

namespace controllers\content;

class home implements \libs\controllerAdapter {

    public function start( array $args ): bool{

        $ContentView = new \views\content\home;
        $ContentView->home( (new \models\Contents)->get() );

        return true;
    }

}