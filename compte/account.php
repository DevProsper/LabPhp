<?php
require_once 'inc/header.php';
require_once 'inc/functions.php';
logged_only();

if (!empty($_POST)) {

    if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
        $_SESSION['flash']['danger'] = "Les mots de passe ne concordent pas";
    }else{
        require_once 'inc/db.php';
        $user_id = $_SESSION['auth']->id;
        $password = md5($_POST['password']);
        $req = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
        $req->execute([$password, $user_id]);
        $_SESSION['flash']['success'] = "Votre mot de passe a bien été modifié";

    }
}
?>
    <h1>Bonjour <?= $_SESSION['auth']->username ?></h1>

    <form action="" method="POST">
      <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="password_confirm">Confirmation mot de passe :</label>
        <input type="password" name="password_confirm" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Changer mot de passe</button>
    </form>

<?php require_once 'inc/footer.php'?>
