<?php  
if (isset($_SESSION['Auth'])) {
	header("Location:index.php");
}
?>
<div class="col-md-5 col-md-offset-2">
            <?php
            if (isset($_POST['submit'])) {
                $email = htmlspecialchars(trim($_POST['email']));
                $password = htmlspecialchars(trim($_POST['password']));

                $errors = [];

                if (empty($email) || empty($password)) {
                    $errors['empty'] = "Tous les champs sont obligatoires";
                }else if (is_admin($email,$password) == 0) {
                    $errors['exist'] = "Cet administrateur n'existe pas";
                }

                if (!empty($errors)) {
                    ?>
                    <div class="card red">
                        <div class="card-content white-text">
                            <?php
                            foreach ($errors as $error) {
                                echo $error."<br/>";
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }else{
                    $_SESSION['Auth'] = $email;
                    header("Location:index.php?page=home");
                }
            }
            ?>

	<h1>Se Connecter</h1>
	<form method="post">
	  <div class="form-group">
	    <label for="email">Votre pseudo</label>
	    <?= input('email', array(
	    	'type' => 'email',
	      	'class' => 'form-control', 
	      	'placeholder' => 'Email ou numéro de téléphone'
	      )); ?>
	  </div>
	  <div class="form-group">
	    <label for="password">Mot de passe</label>
	    <?= input('password', array(
	      	'type' => 'password',
	      	'class' => 'form-control', 
	      	'placeholder' => 'Votre mot de passe'
	      )); ?>
	  </div>
	  <button type="submit" name="submit" class="btn btn-primary">Se connecter</button>
	</form>
</div>
