<?php

namespace views\content;

use \neuralpin\temporalrender\htmlRender;

class home{

    public function home( array $content_list = [] ){

        echo new htmlRender('theme/templates/pages/content-home.php', [
            'content_list' => $content_list,
            'siteConfig' => new \services\siteConfig,
        ]);

        return true;
    }
}