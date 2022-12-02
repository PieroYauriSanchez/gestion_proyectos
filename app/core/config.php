<?php 

// Website title
define('WEBSITE_TITLE', 'My Website');

// DATABASE VARIABLES
define('DB_TYPE', 'sqlsrv');
define('DB_NAME', 'DB_SIS_PROYECTOS');
define('DB_USER', 'CONEXION1');
define('DB_PASS', '123456');
define('DB_HOST', 'localhost');

// Para MySql
// define('DB_TYPE', 'mysql');
// define('DB_NAME', '');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_HOST', 'localhost');

// PROTOCAL TYPE HTTP OR HTTPS
define('PROTOCAL', 'http');

$path = str_replace('\\', '/', PROTOCAL .'://'.$_SERVER['SERVER_NAME'].':8080' .__DIR__.'/');
$path = str_replace($_SERVER['DOCUMENT_ROOT'], '', $path);

define('ROOT', str_replace('/app/core', '', $path));
define('ASSETS', str_replace('app/core', 'public/assets', $path));

define('DEBUG', true);
if(DEBUG){
    ini_set('display_errors', 1);
}else{
    ini_set('display_errors', 0);
}