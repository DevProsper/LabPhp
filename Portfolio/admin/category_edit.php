<?php 
include '../lib/include.php';
?>


	<?php  
	/*
		*ENREGISTREMENT DE LA CATEGORIE
	*/
		if (isset($_POST['name']) && isset($_POST['slug'])) {
			checkCsrf();
			$slug = $_POST['slug'];
			if (preg_match('/^[a-z\0-9]+$/', $slug)) {
				$name = $db->quote($_POST['name']);
				$slug = $db->quote($_POST['slug']);
				//si la methode est en GET on fait une modification si non, on fait une insertion
				if (isset($_GET['id'])) {
					$id = $db->quote($_GET['id']);
					$db->query("UPDATE categories SET name=$name, slug=$slug WHERE id=$id");
				}else{
					$db->query("INSERT INTO categories SET name=$name, slug=$slug");	
				}
				setFlash("La categorie a bien été sauvegarder");
				header("Location:category.php");
				die();
			}else{
				setFlash("le slug n'est pas valide", "danger");
			}
		}
		/*
		* VERIFICATION DE L'EXISTENCE D'UNE CATEGORIE
		*/
		if (isset($_GET['id'])) {
			$id = $db->quote($_GET['id']);
			$select = $db->query("SELECT * FROM categories WHERE id=$id");
			if ($select->rowCount() == 0) {
				setFlash("il n'y a pas de categorie avec cet ID", "danger");
				header("Location:category.php");
				die();
			}
			$_POST = $select->fetch();
		}

include '../partials/admin_header.php';
	?>

<h1>Ajouter une categorie</h1>
	<form action="#" method="post">
	  <div class="form-group">
	    <label for="name">Nom de la categorie</label>
	    <?= input('name'); ?>
	  </div>
	  <div class="form-group">
	    <label for="slug">Url de la cetgorie</label>
	    <?= input('slug'); ?>
	  </div>
	  <?= csrfInput(); ?>
	  <button type="submit" name="submit" class="btn btn-primary">Enregistrer</button>
	</form>

<?php include '../lib/debug.php'; ?>
<?php include '../partials/footer.php'; ?>