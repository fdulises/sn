<?php

require 'theme/templates/sections/header.php';
require 'theme/templates/components/nav.php';

foreach( $content_list as $content ){
    require 'theme/templates/components/content.php';
}

require 'theme/templates/sections/footer.php';