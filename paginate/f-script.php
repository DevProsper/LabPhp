<?php 

if (isset($_GET['pp']) && !empty($_GET['pp']) && ctype_digit($_GET['pp']) == 1) {
	$perPage = $_GET['pp'];
}else{
	$perPage = 4;
}


$req = $db->query('SELECT COUNT(*) AS total FROM produits');
$resultats = $req->fetch();
$total = $resultats[0];

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

	$reqProduits = $db->query("SELECT * FROM produits ORDER BY id ASC LIMIT $firstOpage,$perPage");
