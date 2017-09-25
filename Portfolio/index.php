<?php include 'lib/include.php';
include 'lib/image.php' ?>
<?php include 'partials/header.php' ?>

<?php
/*
* AFFICHAGE DES POSTS ET LEURS IMAGE
*/

$condition = "";
if (isset($_GET["categorie"])) {
	$categorie = $db->quote($_GET['categorie']);
	$condition = "WHERE categories.slug = $categorie";
}
$select = $db->query("
	SELECT works.id, works.name, works.slug, images.name as image_name
	FROM works
	LEFT JOIN images ON images.id = works.image_id
	LEFT JOIN categories ON categories.id = works.category_id
	$condition
");
$works = $select->fetchAll();

$categories = $db->query("SELECT name, slug as categorie FROM categories ORDER BY name ASC")->fetchAll();
?>
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<h1>Listes des realisation</h1>
			<?php foreach ($works as $k => $v): ?>
				<?php/*
				<?= WEBROOT; ?>realisation/<?= $v['slug']; ?>
				*/  
				?>
				<a href="view.php?slug=<?= $v['slug']; ?>">
					<img src="<?= WEBROOT; ?>img/works/<?= resizeName($v['image_name'], 150, 150); ?>" alt="">
					<h2><?= $v['name']; ?></h2>
				</a>
		<?php endforeach ?>
		</div>
		<div class="col-sm-4">
			<h1>Listes des categories</h1>
			<ul>
				<?php foreach ($categories as $category): ?>
					<li><a href="index.php?categorie=<?= $category['categorie'] ?>"><?= $category['name'] ?></a></li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
</div>
<?php include 'lib/debug.php'; ?>
<?php include 'partials/footer.php' ?>