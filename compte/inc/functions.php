<?php
function debug($variable){
    echo '<pre>' . print_r($variable, true) . '</pre>';
}

function str_random($lenght){
    $alphabet = "132425383309HDGDHDHDDjhhsdckbkshgazftyahsdiiu634RJKBSKCJ";
    return substr(str_shuffle(str_repeat($alphabet, $lenght)), 0, $lenght);
}

function logged_only(){
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
    if (!isset($_SESSION['auth'])) {
        $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'acceder a cette page";
        header("Location : login.php");
        exit();
    }
}

function reconnect_from_cookie(){

  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }

  if (isset($_COOKIE['remenber'])) {
      require_once 'db.php';
      if (!isset($pdo)) {
          global $pdo;
      }
      $remenber_token = $_COOKIE['remenber'];
      $parts = explode('==', $remenber_token);
      $user_id = $parts[0];
      $req = $pdo->prepare("SELECT * FROM users WHERE id = ?");
      $req->execute([$user_id]);
      $user = $req->fetch();
      if ($user) {
          $expected = $user->id . '==' . $user->remenber_token . sha1($user->id . 'ratonvaleurs');
          if ($expected == $remenber_token) {
              session_start();
              $_SESSION['auth'] = $user;
              //Reconstruit le cookie
              setcookie('remenber', $remenber_token, time() + 60 * 60 * 24 * 7);
          }else {
              setcookie('remenber', NULL, -1);
          }
      }else {
          setcookie('remenber', NULL, -1);
      }
  }
}
