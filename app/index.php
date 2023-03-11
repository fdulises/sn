<?php

require 'lib/db.php';
require 'models/users.php';
require 'models/contents.php';

\lib\db::connect();

// $user = new \models\users();
// var_dump($user->create());

$content = new \models\contents();
// var_dump($content->create([
//     'user_id' => 1,
//     'title' => 'Publicacion #1',
//     'body' => '{}',
//     'interactions' => '{}',
//     'category_id' => 0,
//     'audience' => 1,
// ]));

var_dump($content->getByID(1));