<?php

define('ENVIRONMENT', 'development');

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
}
// App constants
define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', 'http://');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);	
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('IMG_DIR', ROOT . URL_PUBLIC_FOLDER . '/img/');
define('IMG_URL', URL . 'img/');
define('MAX_IMAGE_SIZE', 2000000);
// DB Constants
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'recetas');
define('DB_USER', 'invitado');
define('DB_PASS', 'invitado');
define('DB_CHARSET', 'utf8');	