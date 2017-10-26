<?php
if (isset($_GET['pp']) && !empty($_GET['pp']) && ctype_digit($_GET['pp']) == 1) {
	$perPage = $_GET['pp'];
}else{
	$perPage = 2;
}


$req = $db->query('SELECT COUNT(*) AS total FROM posts');
$resultats = $req->fetch();
$total = $resultats['total'];

$nbPage = ceil($total/$perPage);

if (isset($_GET['p']) && !empty($_GET['p']) && ctype_digit($_GET['p']) == 1) {
	if ($_GET['p'] > $nbPage) {
		$current = $nbPage;
	}else{
		$current = $_GET['p'];
	}
}else{
		$current = 1;
}

$firstOpage = ($current-1)*$perPage;
$reqCategories = $db->query("SELECT * FROM posts
	ORDER BY posts.created ASC LIMIT $firstOpage,$perPage 
");

