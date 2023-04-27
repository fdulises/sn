<?php

namespace views;

use \neuralpin\temporalrender\htmlRender;

class ContentView{

    public $siteConfig;

    public function __construct(){
        $this->siteConfig = new \services\siteConfig;
    }

    public function home( array $content_list = [] ){

        echo new htmlRender('theme/templates/pages/content-home.php', [
            'content_list' => $content_list,
            'siteConfig' => $this->siteConfig,
        ]);

        return true;
    }

    public function single( array $content = [] ){

        echo new htmlRender('theme/templates/pages/content-single.php', [
            'content' => $content,
            'siteConfig' => $this->siteConfig,
        ]);

        return true;
    }
}