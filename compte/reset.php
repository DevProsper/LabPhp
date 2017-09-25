<?php
require_once 'inc/header.php';
?>
<h1>Reinitialiser mon mot de passe</h1>

<?php
if (isset($_GET['id']) && isset($_GET['token'])) {
    require_once 'inc/db.php';
    $req = $pdo->prepare("SELECT * FROM users WHERE id = ? AND reset_token IS NOT NULL AND reset_token = ?
    AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)");
    $req->execute([$_GET['id'], $_GET['token']]);
    $user = $req->fetch();
    if ($user) {
        if (!empty($_POS['password']) && $_POST['password'] == $_POST['password_confirm']) {
            $password = md5($_POST['password']);
            $pdo->prepare("UPDATE users SET password = ? reset_token = NULL, reset_at = NULL")->execute([$password]);
            session_start();
            $_SESSION['flash']['success'] = "Votre mot de passe bien été modifié";
            $_SESSION['auth'] = $user;
            header("Location: account.php");
            exit();
        }
    }else{
        session_start();
        $_SESSION['flash']['danger'] = "Ce token n'est pas valide";
        header("Location: login.php");
        exit();
    }
}else{
    header("Location: login.php");
    exit();
}


?>

<form action="" method="POST">
  <div class="form-group">
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="password_confirm">Confirmation mot de passe :</label>
    <input type="password" name="password_confirm" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary">Reinitialiser le mot de passe</button>
</form>

<?php require_once 'inc/footer.php'?>
