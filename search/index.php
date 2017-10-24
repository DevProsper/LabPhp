<?php
include 'connect.php';
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
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <style media="screen">
        span.surlign1{font-style: italic; background-color: #ffff00;}
        span.surlign2{font-style: italic; background-color: #ff99ff;}
        span.surlign3{font-style: italic; background-color: #ff9999;}
        span.surlign4{font-style: italic; background-color: #9999ff;}
    </style>
    <?php include 'pages/' .$page.'.php'; ?>
  </body>
</html>
