<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php
setlocale(LC_TIME, 'fr');
$var = strftime('%A le %d', strtotime($requtte_provenant_de_la_bdd));
var_dump($var);
?>
</body>
</html>