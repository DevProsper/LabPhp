<?php require 'functions/auth.php'; 

if (admin() != 1 && modo() !=1) {
	header("Location:index.php?page=users");
}
?>

<h1>Réservé aux Modérateurs</h1>