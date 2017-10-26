<?php
include 'functions/db.php';
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
<html lang="en">
<!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Jan 2017 10:25:30 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>
    <style type="text/css">
    .cont{
    	padding-top: 70px;
    }
    </style>

    <!-- Bootstrap core CSS -->
    <link href="public/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Mon Projet</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <?php include 'partials/header.php'; ?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container cont">
    	<?php include 'pages/' .$page.'.php'; ?>
    </div><!-- /.container -->

  </body>

<!-- Mirrored from getbootstrap.com/examples/starter-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Jan 2017 10:25:30 GMT -->
</html>
