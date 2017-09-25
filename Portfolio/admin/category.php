<?php 
include '../lib/include.php';
include '../partials/admin_header.php';
/*
SUPPRESSION DES CATEGORIES
*/

if (isset($_GET['delete'])) {
	checkCsrf();
	$id = $db->quote($_GET['delete']);
	$db->query("DELETE FROM categories WHERE id = $id");
	 setFlash("La categorie a bien été supprimer");
	 header("Location:category.php");
	 die();
}

/*
RECUPERATION DES CATEGORIES
*/
$select = $db->query('SELECT id,name,slug FROM categories');
$categories = $select->fetchAll();


?>

<h1>Listes des categories</h1>
<p><a href="category_edit.php" class="btn btn-success">Ajouter une categorie</a></p>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nom</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($categories as $category): ?>
			<tr>
				<td><?= $category['id'] ?></td>
				<td><?= $category['name'] ?></td>
				<td>
					<a href="category_edit.php?id=<?= $category['id'] ?>" class="btn btn-default">Editer</a>
					<a href="?delete=<?= $category['id'] ?>&<?= csrf(); ?>" class="btn btn-danger" onclick="return confirm('Etes vous sur de supprimer ?')">Suprimer</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<?php include '../lib/debug.php'; ?>
<?php include '../partials/footer.php'; ?>