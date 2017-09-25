<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <script src="js/jquery.min.js" type="text/javascript"></script>



<?php if(isset($script)): ?><?= $script ?><?php endif; ?>
    <meta charset="utf-8">
</head>
<body>
     <nav class="navbar navbar-inverse navbar-static-top">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse navbar-ex1-collapse">
                    
                                <!-- .nav -->
                                <ul class="nav navbar-nav">
                                    <li><a href="#">Mon Administration</a></li>
                                    <li><a href="category.php">Categories</a></li>
                                    <li><a href="work.php">Mes realisation</a></li>
                                </ul>
                                <!-- /.nav -->
                            </div>
                        </div>
                        <!-- /.container-fluid -->
    </nav>
<div class="container">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
        <?= flash(); ?>