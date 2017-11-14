<?php
require 'includes.php';
$session = new Session();
$pages = scandir('pages/');
if (isset($_GET['page']) && !empty($_GET['page'])) {
    if (in_array($_GET['page'].'.php', $pages)) {
        $page = $_GET['page'];
    }else{
        $page = 'error';
    }
}else{
    $page = 'home';
}

$page_func = scandir('functions/');
if (in_array($page.'.func.php', $page_func)) {
    include 'functions/'.$page.'.func.php';
}
?>
<!DOCTYPE html>
<html>
    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
      <title>TP Materialize.css</title>

      <!-- CSS  -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <script type="text/javascript" src="js/script.js"></script>
    </head>

    <body>
      <nav class="grey darken-4" role="navigation">
        <div class="container">
          <a id="logo-container" href="#" class="brand-logo">Message flash</a>
          <ul class="right hide-on-med-and-down">
            <li><a href="#">Prosper</a></li>
          </ul>

          <ul id="nav-mobile" class="side-nav">
            <li><a href="#">Prosper</a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
      </nav>

          <?php
          $session->showFlash();
          include 'pages/' .$page.'.php';
          ?>
          <pre>
            <?php print_r($_SESSION); ?>
          </pre>
    </body>
</html>
