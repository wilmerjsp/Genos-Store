<?php

require_once 'config/config.php';
require_once 'helpers/helpers.php';

$url = !empty($_GET['url']) ? $_GET['url'] : 'home/home';

$arrayUrl = explode('/', $url);

$controller = $arrayUrl[0];
$method = $arrayUrl[0];
$params = "";

if (isset($arrayUrl[1]) && $arrayUrl[1] != "") {
    $method = $arrayUrl[1];
}

if (isset($arrayUrl[2]) && $arrayUrl[2] != "") {
    for ($i=2; $i < count($arrayUrl); $i++) { 
        $params .= $arrayUrl[$i].",";
    }
    $params = trim($params, ',');
}

require_once "lib/core/autoload.php";

#load
require_once "lib/core/load.php";


?>