<?php

function baseUrl(){
    return BASE_URL;
}

function media(){
    return BASE_URL."/assets";
}

function dep($data){
    $fotmat = print_r('<pre>');
    $fotmat .= print_r($data);
    $fotmat .= print_r('</pre>');
    return $fotmat;
}

function headerAdmin($data=""){
    $view_header = "view/template/header_admin.php";
    require_once($view_header);
}

function footerAdmin($data=""){
    $view_footer = "view/template/footer_admin.php";
    require_once($view_footer);
}

function getModal(string $nameModal, $data){
    $view_modal = "view/template/modals/{$nameModal}.php";
    require_once($view_modal);
}


function passGenerator($length = 10){
    $pass = "";
    $longitudPass = $length;
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $longitudCadena = strlen($cadena);

    for ($i=0; $i < $longitudPass; $i++) { 
        $pos = rand(0, $longitudCadena-1);
        $pass .= substr($cadena, $pos,1); 
    }
    return $pass;
}

function token(){
    $r1 = bin2hex(random_bytes(10));
    $r2 = bin2hex(random_bytes(10));
    $r3 = bin2hex(random_bytes(10));
    $r4 = bin2hex(random_bytes(10));

    $token = $r1 .'-'. $r2 .'-'. $r3 .'-'. $r4;

    return $token;
}

function formatMoney($cantidad){
    $cantidad = number_format($cantidad,2,SPD,SPM); 
    return $cantidad;
}
