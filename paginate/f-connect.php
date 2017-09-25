<?php 

$host 	= "localhost";
$dbname = "paginate";
$dbuser = "root";
$dbpass = "";

try {

	$db = new PDO('mysql:host:='.$host.';dbname='.$dbname,$dbuser,$dbpass);
	
} catch (PDOexeption $e) {
	echo "Erreur lors de la connection à la base de donnée";
}

 ?>