<?php
$auth = 0 ; 
include 'lib/include.php';
include 'lib/image.php';
/*
* VERIFICATION DE L'EXISTENCE DU SLUG
*/
if (!isset($_GET['slug'])) {
	header("HTTP/1.1 301 Moved permanently");
	header("Location:index.php");
	setFlash("L'url que vous avez taper n'est pas correcte", "danger");
	die();
}
$slug = $db->quote($_GET['slug']);
/*
* SELECTION DES POSTS
*/
$select = $db->query("SELECT * FROM works WHERE slug = $slug");
if ($select->rowCount() == 0) {
	header("HTTP/1.1 301 Moved permanently");
	header("Location:index.php");
	die();
}
$work = $select->fetch();
$work_id = $work['id'];

/*
* SELECTION DES IMAGES
*/
$select = $db->query("SELECT * FROM images WHERE work_id = $work_id");
$images = $select->fetchAll();

include 'partials/header.php';
?>
<h1><?= $work['name']; ?></h1>
<?= $work['content']; ?>
<?php foreach ($images as $k => $v): ?>
	<img src="<?= WEBROOT; ?>/img/works/<?= $v['name'] ?>" width="100%">
<?php endforeach ?>
<?php include 'lib/debug.php'; ?>
<?php include 'partials/footer.php' ?>