<div class="col-sm-9">
	<h1>Gestion des Produits</h1>
	  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	  tempor incididunt ut labore et.</p>
<p><a href="post_edit.php" class="btn btn-success">Ajouter une categorie</a></p>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nom</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			while ($category = $reqCategories->fetch()) {
			?>
			<tr>
				<td><?= $category['id']?></td>
				<td><?= $category['name']?></td>
				<td>
					<a href="post_edit.php?id=<?= $category['id'] ?>" class="btn btn-default">Editer</a>
					<a href="view_edit.php?id=<?= $category['id'] ?>" class="btn btn-default">Visualiser</a>
				</td>
			</tr>
			<?php
			} 
		?>
	</tbody>
</table>
</div>

<ul class="pagination">
    <li>
		<a class="<?php if($current == '1'){ echo "disabled";} ?>" href="index.php?page=posts&p=<?php if($current != '1'){echo $current-1;}else{ echo $current;} ?>" aria-label="Previous">
			<span aria-hidden="true">&laquo;</span>
		</a>
	</li>
		<?php
			for ($i=1; $i <= $nbPage ; $i++) {
			    if ($i == $current) {
				?>
				<li class="active"><a href="index.php?page=posts&p=<?= $i ?>"><?= $i ?></a></li>
				    <?php
			    	}else{
			    	?>
				<li><a href="index.php?page=posts&p=<?= $i ?>"><?= $i ?></a></li>
				<?php
			   }   		 	
			} 
		?>
	<li>
	    <a class="<?php if($current == '1'){ echo "disabled";} ?>" href="index.php?page=posts&p=<?php if($current != $nbPage){echo $current+1;}else{ echo $nbPage;} ?>" aria-label="Previous">
			<span aria-hidden="true">&raquo;</span>
		</a>
	</li>
</ul>