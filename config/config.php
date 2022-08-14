<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('TEMPLATES_DIR', ROOT . '/templates/');

define('HOST', 'localhost');
define('USER', '*****');
define('PASS', '*****');
define('DB_NAME', '*****');

require "./engine/router.php";
require "./engine/routerApi.php";
require "./engine/db.php";
require "./engine/render.php";

require "./modules/catalog.php";
require "./modules/basket.php";
require "./modules/offer.php";
require "./modules/mail.php";
