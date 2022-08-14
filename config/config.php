<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('TEMPLATES_DIR', ROOT . '/templates/');

//define('HOST', 'localhost');
//define('USER', 'k92772gs_db2');
//define('PASS', 'q6t6*zrW97rs');
//define('DB_NAME', 'k92772gs_db2');

define('HOST', 'localhost:3306');
define('USER', 'denis_s');
define('PASS', 'Fib0naccI12358');
define('DB_NAME', 'lider');

require "./engine/router.php";
require "./engine/routerApi.php";
require "./engine/db.php";
require "./engine/render.php";

require "./modules/catalog.php";
require "./modules/basket.php";
require "./modules/offer.php";
require "./modules/mail.php";