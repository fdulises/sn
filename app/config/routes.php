<?php

use libs\router;

// router::add([
//     'uri' => '/',
//     'controller' => function(){
//         echo 'Hola mundo';

//         // require 'theme/templates/sections/header.php';
//         // require 'theme/templates/sections/nav.php';
//         // require 'theme/templates/components/feed.php';
//         // require 'theme/templates/sections/footer.php';
//     }
// ]);

// router::add([
//     'uri' => 'login',
//     'controller' => function(){
//         echo "Iniciar sesión";
//     }
// ]);

// router::add([
//     'uri' => 'register',
//     'controller' => function(){
//         echo "Registro";
//     }
// ]);

// router::add([
//     'uri' => 'profile',
//     'controller' => function(){
//         echo "Perfil: Mi perfil";
//     }
// ]);

router::add([
    'uri' => 'profile/{user}',
    'controller' => function( $user ){
        echo "Perfil: $user";
    }
]);

// router::add([
//     'uri' => 'content/{idcontent}',
//     'controller' => function( $idcontent ){
//         echo "Perfil: $idcontent";
//     }
// ]);