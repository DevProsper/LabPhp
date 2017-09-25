<?php 
include '../lib/include.php';
include '../partials/admin_header.php';
/*
SUPPRESSION DES POSTS
*/

if (isset($_GET['delete'])) {
	checkCsrf();
	$id = $db->quote($_GET['delete']);
	$db->query("DELETE FROM works WHERE id = $id");
	 setFlash("La categorie a bien été supprimer");
	 header("Location:work.php");
	 die();
}

/*
*RECUPERATION DES POSTS
*/
$select = $db->query('SELECT id,name,slug FROM works');
$works = $select->fetchAll();


?>

<h1>Listes des works</h1>
<p><a href="work_edit.php" class="btn btn-success">Ajouter une categorie</a></p>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nom</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($works as $work): ?>
			<tr>
				<td><?= $work['id'] ?></td>
				<td><?= $work['name'] ?></td>
				<td>
					<a href="work_edit.php?id=<?= $work['id'] ?>" class="btn btn-default">Editer</a>
					<a href="?delete=<?= $work['id'] ?>&<?= csrf(); ?>" class="btn btn-danger" onclick="return confirm('Etes vous sur de supprimer ?')">Suprimer</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<?php include '../lib/debug.php'; ?>
<?php include '../partials/footer.php'; ?>