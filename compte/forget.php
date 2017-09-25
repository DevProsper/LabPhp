<?php
require_once 'inc/header.php';
?>
<?php
if (!empty($_POST) && !empty($_POST['email'])) {
    require_once 'inc/db.php';
    require_once 'inc/functions.php';

    $req = $pdo->prepare("SELECT * FROM users where email= ?");
    //$req = $pdo->prepare("SELECT * FROM users where email = ? AND confirmed_at IS NOT NULL");
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
    if ($user) {
        $reset_token = str_random(60);
        $req = $pdo->prepare("UPDATE users SET reset_token = ? , reset_at = NOW() where id = ?");
        //$req->execute([$reset_token, $user->id]);
        $req->execute([$reset_token, $user->id]);
        mail($_POST['email'], "Reinitialisation du mot de passe",
            "Afin de reinitialisé votre mot de passe,
            merci de cliquer sur ce
            lien\n\nhttp://localhost/Lab/compte/reset.php?id={$user->id}&token=$reset_token");
        $_SESSION['flash']['success'] = "Un mail vous a été envoyer";
        header("Location: login.php");
        exit();
    }else{
        $_SESSION['flash']['danger'] = "Aucun compte ne correspond a cet email";
    }
}
?>
<h1>Rappelle de mot de passe</h1>
<form action="" method="POST">
  <div class="form-group">
    <label for="email">Email :</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary">Mot de passe oublié</button>
</form>

<?php require_once 'inc/footer.php'?>
