<?php 
session_start();

if (isset($_POST['captcha'])) {
	if ($_POST['captcha'] == $_SESSION['captcha']) {
		echo "Valide";
	}else{
		echo "Invalide";
	}
}


?>

<form method="post">
	<img src="captcha.php"/>
	<input type="text" name="captcha">
	<input type="submit" value="Verifier">
</form>