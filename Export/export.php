<?php
$dbhost = 'localhost';
$dbname = 'androidtest';
$dbuser = 'root';
$dbpswd = '';

try {
    $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpswd,
    	array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
    		  PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
    		  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC)
    	);
} catch (PDException $e) {
    echo $e;
}

$req = $db->prepare("SELECT id as Id,name as Nom,content as Contenu FROM posts");
$req->execute();
$data = $req->fetchAll();
require 'class.csv.php';
CSV::export($data, 'Export');
?>