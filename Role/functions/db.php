<?php
session_start();
require 'form.php';
$dbhost = 'localhost';
$dbname = 'androidtest';
$dbuser = 'root';
$dbpswd = '';

try {
    $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDException $e) {
    echo $e;
}

function admin(){
	if(isset($_SESSION['Auth'])) {
		global $db;

		$a = [
			'email'	=> $_SESSION['Auth'],
			'role'	=> 'admin'
		];

		$sql = "SELECT * FROM users WHERE email=:email AND role=:role";
		$req = $db->prepare($sql);
		$req->execute($a);
		$exist = $req->rowCount($sql);

		return $exist;
	}else{
		return 0;
	}
}

function modo(){
	if(isset($_SESSION['Auth'])) {
		global $db;

		$a = [
			'email'	=> $_SESSION['Auth'],
			'role'	=> 'modo'
		];

		$sql = "SELECT * FROM users WHERE email=:email AND role=:role";
		$req = $db->prepare($sql);
		$req->execute($a);
		$exist = $req->rowCount($sql);

		return $exist;
	}else{
		return 0;
	}
}