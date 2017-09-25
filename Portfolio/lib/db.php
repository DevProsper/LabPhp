<?php 
try {
	$db = new PDO('mysql:host=localhost;dbname=brut', 'root', '');
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $e) {
	echo "Connection Impossible";
	//echo $e->getMessage();
}

