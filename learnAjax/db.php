<?php
$dbhost = 'localhost';
$dbname = 'php_lab';
$dbuser = 'root';
$dbpswd = '';

try {
    $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpswd,
    	array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
    		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDException $e) {
    echo $e;
}

?>