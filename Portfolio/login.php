<?php
$auth = 0 ;
include 'lib/include.php';
include 'partials/header.php';

/*
TRAITEMENT DU FORMULAIRE
*/
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $db->quote($_POST['username']);
    $password = sha1($_POST['password']);
    $sql = $db->query("SELECT * FROM users WHERE username = $username AND password = '$password'");
    if ($sql->rowCount() > 0) {
        $_SESSION['Auth'] = $sql->fetch();
        flash("Vous etes maintenant connecte");
        header('Location:' . WEBROOT . 'admin/index.php');
    }
}
/*
*Inclusion du header
*/
 ?>

    <form action="#" method="post">
	  <div class="form-group">
	    <label for="username">Nom d'utilisateur</label>
	    <?= input('username'); ?>
	  </div>
	  <div class="form-group">
	    <label for="password">Mot de passe</label>
	    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
	  </div>
	  <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
	</form>
<?php include 'lib/debug.php'; ?>

<?php include 'partials/footer.php' ?>
