<?php

namespace views;

class ContentView{
    public function home( array $content = [] ){
        require 'theme/templates/sections/header.php';
        require 'theme/templates/components/nav.php';
        require 'theme/templates/components/feed.php';
        require 'theme/templates/sections/footer.php';
    }
}