<?php
require_once 'inc/functions.php';
reconnect_from_cookie();
if (isset($_SESSION['auth'])) {
    header("Location: account.php");
    exit();
}
if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
    require_once 'inc/db.php';

    $req = $pdo->prepare("SELECT * FROM users where username= :username OR email= :username");
    //$req = $pdo->prepare("SELECT * FROM users where (username= :username OR email= :username) AND confirmed_at IS NOT NULL");
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch();
    $password_user = $user->password;
    $password = md5($_POST['password']);
    if ($password_user === $password) {
        $_SESSION['auth'] = $user;
        header("Location: account.php");
        $_SESSION['flash']['success'] = "Vous êtes connecté";
        if ($_POST['remenber']){
            $remenber_token = str_random(250);
            $req = $pdo->prepare("UPDATE users SET remenber_token = ? WHERE id = ?");
            $req->execute([$remenber_token, $user->id]);
              setcookie('remenber', $user->id . '==' . $remenber_token . sha1($user->id . 'ratonvaleurs')
              , time() + 60 * 60 * 24* 7);
        }
        header("Location: account.php");
        exit();
    }else{
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorecte';
    }
}

?>
<?php require_once 'inc/header.php'; ?>
<h1>Se connecter</h1>

<form action="" method="POST">
  <div class="form-group">
    <label for="username">Pseudo ou email :</label>
    <input type="text" name="username" class="form-control" >
  </div>

  <div class="form-group">
    <label for="password">Mot de passe : <a href="forget.php">(J'ai oublié mon mot de passe)</a></label>
    <input type="password" name="password" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="remenber">
        <input type="checkbox" name="remenber" value="1"/> Se souvenir de moi
    </label>
  </div>

  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php require_once 'inc/footer.php'?>
