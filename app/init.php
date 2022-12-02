<?php

require __DIR__."/core/config.php";
require __DIR__."/core/functions.php";  //helpers
require __DIR__."/core/database.php";
require __DIR__."/core/controller.php";
require __DIR__."/core/app.php";
require __DIR__."/libs/correo.php";;

$_SESSION["usuario"] = true;

if(!$_SESSION["usuario"]){
    echo("<h1>NO TIENE ACCESO</h1>");
    die();
}

// GLOBALES INICIALES
if (!isset($_SESSION["msg_success"])) {
    $_SESSION["msg_success"] = [];
}
if (!isset($_SESSION["msg_wrong"])) {
    $_SESSION["msg_wrong"] = [];
}

// INICIO DEL APP

$app = new App();


// LIMPIAR GLOBALES
if (isset($_SESSION["msg_success"]) && is_array($_SESSION["msg_success"]) && count($_SESSION["msg_success"]) > 0) {
    unset($_SESSION["msg_success"]);
}
if (isset($_SESSION["msg_wrong"]) && is_array($_SESSION["msg_wrong"]) && count($_SESSION["msg_wrong"]) > 0) {
    unset($_SESSION["msg_wrong"]);
}
