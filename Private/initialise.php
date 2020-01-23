<?php
require('Classes/Database.php');
ob_start();

session_start();

define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH.'/Public');
define("SHARED_PATH", PRIVATE_PATH . '/Shared');
define("CLASS_PATH", PRIVATE_PATH . '/Classes');

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/Public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

require('functions.php');
require('server.php');

spl_autoload_register(function ($class_name) {
    require(CLASS_PATH.'/'.$class_name.'.php');
});

$Database= new Database();

$db = Database::db_connect();
?>
