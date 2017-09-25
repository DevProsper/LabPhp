<?php
include 'functions/main.func.php';
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
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <meta name="twitter:" content="" charset="utf-8">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <?php include 'body/topbar.php'; ?>
      <div class="container">
          <?php include 'pages/' .$page.'.php'; ?>
      </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <script type="text/javascript" src="js/script.js"></script>
      <script type="text/javascript" src="js/post.func.js"></script>
      <?php
      $page_js= scandir('js/');
      if (in_array($page.'.func.php', $page_js)) {
        ?>
        <script type="text/javascript" src="js/<?= $page ?>.func.js"></script>
        <?php

      }
      ?>
    </body>
</html>
