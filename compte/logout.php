<?php
session_start();
setcookie('remenber', NULL, -1);
unset($_SESSION['auth']);
$_SESSION['flash']['success'] = "Vous êtes maintenant déconnecté";
header("Location: login.php");
