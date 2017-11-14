<?php ?>
<div class="parallax-container">
	<div class="parallax">
		<img src="img/pros.jpg" alt="Prosper image bouton">
	</div>
</div>

<?php
if (isset($_POST['login_success'])) {
  	$session->setFlash("Vous avez été bien connecté", "green");
 }

 if (isset($_POST['login_fail'])) {
  	$session->setFlash("Vous avez été bien déconnecté", "red");
 }

 if (isset($_POST['login_multiple_errors'])) {
  	$session->setFlash("Email vide", "green");
  	$session->setFlash("Adresse email invalide", "red");
  }
?>

<div class="container">
	<div class="row">
		<h3>Se connecter</h3>
		<div class="row">
			<div class="div input-field col s6">
				<i class="material-icons prefix">account_circle</i>
				<input type="text" id="email" name="email" class="validate">
				<label for="email"></label>
			</div>
			<div class="div input-field col s6">
				<i class="material-icons prefix">lock</i>
				<input type="text" id="password" name="password" class="validate">
				<label for="password"></label>
			</div>
		</div>
		<form  method="post">
			<div class="row">
				<div class="col s6">
				<button type="submit" class="btn btn-block green col s12" name="login_success">
					Connéction réussi
				</button>
				</div>
				<div class="col s6">
					<button type="submit" class="btn btn-block red col s12" name="login_fail">
						Connéction érroné
					</button>
				</div>
			</div>

			<div class="row">
				<div class="col s12">
					<button type="submit" class="btn btn-block blue col s12" name="login_multiple_errors">
					Connéction érroné avec multiples errors
				</button>
				</div>
			</div>
		</form>
	</div>
</div>