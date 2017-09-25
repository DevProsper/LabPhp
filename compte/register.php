<?php
require_once 'inc/functions.php';
if (!empty($_POST)) {

  $errors = array();
  require_once 'inc/db.php';

  if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) {
    $errors['username'] = "Votre pseudo n'est pas valide (alphanumerique)";
  }else{
      $req = $pdo->prepare("SELECT id FROM users where username = ?");
      $req->execute([$_POST['username']]);
      $user = $req->fetch();
      //debug($user); affiche le premier enregistrement qu'il a pu eu
      if ($user) {
          $errors['username'] = "Ce pseudo est déja pris";
      }
  }

  if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Votre email n'est pas valide ()";
  }else{
      $req = $pdo->prepare("SELECT id FROM users where email = ?");
      $req->execute([$_POST['email']]);
      $user = $req->fetch();
      //debug($user); affiche le premier enregistrement qu'il a pu eu
      if ($user) {
          $errors['email'] = "Cet email est déja utilisé pour un autre compte";
      }
  }

  if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
    $errors['email'] = "Votre mot de passe ne concorde pas :) ";
  }

    if (empty($errors)) {

      $req = $pdo->prepare("INSERT INTO users SET username = ?, password = ?, email = ?, confirmation_token = ?");
      $token = str_random(60);
      //debug($token);
      session_start();
      $password = md5($_POST['password']);
      $req->execute([$_POST['username'], $password, $_POST['email'], $token]);
        $token_id = $pdo->lastInsertId();
        mail($_POST['email'], "Confirmation du compte",
            "Afin de valider votre email,
            merci de cliquer sur ce
            lien\n\nhttp://localhost/Lab/compte/comfirm.php?id=$token_id&token=$token");
            $_SESSION['flash']['success'] = "Un email de confirmation vous a été envoyer";
        header("Location: login.php");
        exit();
    }
}



?>

<?php require 'inc/header.php'; ?>

<?php if (!empty($errors)): ?>
  <div class="alert alert-danger">
    <ul>
      <?php foreach ($errors as $error): ?>
          <li> <?= $error ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>

<h1>Compte menbre et confirmation par mail</h1>

<form action="" method="POST">
  <div class="form-group">
    <label for="username">Pseudo :</label>
    <input type="text" name="username" class="form-control" >
  </div>
  <div class="form-group">
    <label for="email">Email :</label>
    <input type="email" name="email" class="form-control" >
  </div>
  <div class="form-group">
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="password_confirm">Confirmation mot de passe :</label>
    <input type="password" name="password_confirm" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary">M'inscrire</button>
</form>
<?php require 'inc/footer.php'; ?>
