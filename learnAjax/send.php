<?php 
require 'db.php';

if (isset($_POST['nom'], $_POST['message']) && !empty($_POST['nom']) && !empty($_POST['message'])) {
	$nom = mysql_real_escape_string(htmlspecialchars(trim($_POST['nom'])));
	$message = mysql_real_escape_string(htmlspecialchars(trim($_POST['message'])));
	$db->exec("INSERT INTO post(id,nom,message) VALUES('','$nom','$message')");

	echo '<span class="success">Vos donées ont été sauvegarder</span>';
}else{
	echo '<span class="error">Veillez complétez tous les champs</span>';
}