<?php
session_start();
if (!isset($auth)) {
	if (!isset($_SESSION['Auth']['id'])) {
		header("Location:" .WEBROOT."login.php");
		die();
	}
}

//Pour generer un url qui ne sera pas devinable par l'utilisateur pour eviter le crossign (AttACK) lors de la suppression
//Ce code sera generer par un session tous le long de la navigation
if (!isset($_SESSION['csrf'])) {
	$_SESSION['csrf'] = md5(time() + rand());
}

function csrf(){
	return 'csrf=' .$_SESSION['csrf'];
}


function csrfInput(){
	return '<input type="hidden" value="'. $_SESSION['csrf'] .'" name="csrf">';
}
function checkcsrf(){
	//Si le lien que l'utilisateur q taper est incorect, bloque la page
	if (isset($_POST['csrf']) && $_POST['csrf'] == $_SESSION['csrf'] || 
		(isset($_GET['csrf']) && $_GET['csrf'] == $_SESSION['csrf']) ){
		return true;
	}
	header('Location:' .WEBROOT. 'csfr.php');
		die();
}























/*session_start(); 
if (isset($auth)) {
	if (!isset($_SESSION['Auth']['id'])) {
		header('Location:' . WEBROOT . 'login.php');
		die();
	}
}

//Pour generer un url qui ne sera pas devinable par l'utilisateur pour eviter le crossign (AttACK) lors de la suppression
//Ce code sera generer par un session tous le long de la navigation
if (!isset($_SESSION['csfr'])) {
	$_SESSION['csfr'] = md5(time() + rand());
}

function csfr(){
	return 'csfr=' .$_SESSION['csfr'];
}

function csrfInput(){
	return '<input type="hidden" value="'. $_SESSION['csfr'] .'" name="csfr">';
}
function checkCsfr(){
	//Si le lien que l'utilisateur q taper est incorect, bloque la page
	if (isset($_POST['csfr']) && $_POST['csfr'] == $_SESSION['csfr'] || 
		(isset($_GET['csfr']) && $_GET['csfr'] == $_SESSION['csfr']) ){
		return true;
	}
	header('Location:' .WEBROOT. 'csfr.php');
		die();
}*/