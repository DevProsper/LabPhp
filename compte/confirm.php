<?php
$user_id = $_GET['id'];
$token = $_GET['token'];
require_once 'db.php';
$req = $pdo->prepare("SELECT * FROM users where id = ?");
$req->execute([$user_id]);
$user = $req->fetch();
session_start();

if($user && $user->confirmation_token == $token){
    $pdo->prepare("UPDATE users SET comfirmation_token = NULL , confirmed_at = NOW() where id = ?")->execute([$user_id]);
    $_SESSION['flash']['success'] = "Votre compte a bien été validé";
    $_SESSION['auth'] = $user;
    header("Location: account.php");
}else{
    $_SESSION['flash']['danger'] = "Ce token n'est plus valide";
   header("Loaction: login.php");
}
