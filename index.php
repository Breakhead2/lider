<?php

require "./config/config.php";

$data = [];

session_start();

$array_url = explode('/', $_SERVER['REQUEST_URI']);

if($array_url[1] == ""){
    $page = "index";
}else{
    $page = $array_url[1];
}

$data = router($page, $array_url);

echo render($data["page"], $data["params"]);