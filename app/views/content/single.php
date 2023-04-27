<?php

namespace views\content;

use \neuralpin\temporalrender\htmlRender;

class single{

    public function single( array $content = [] ){

        echo new htmlRender('theme/templates/pages/content-single.php', [
            'content' => $content,
            'siteConfig' => new \services\siteConfig,
        ]);

        return true;
    }
}