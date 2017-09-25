<?php 
	include 'f-connect.php';
	include 'f-script.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Sailor - Bootstrap 3 corporate template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Bootstrap 3 template for corporate business" />
<!-- css -->
<link href="assets/style.css" rel="stylesheet" />

<!-- =======================================================
    Theme Name: Sailor
    Theme URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
======================================================= -->

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
				  <table class="table">
				    <thead>
				    	<tr>
				    		<th>#</th>
					    	<th>Produits</th>
					    	<th>Prix</th>
				    	</tr>
				    </thead>
				    <tbody>
				    	<?php
				    		while ($products = $reqProduits->fetch()) {
				    		 	?>
				    		 	<tr>
						    		<td><?= $products['id']?></td>
						    		<td><?= $products['article']?></td>
						    		<td><?= $products['prix']?></td>
						    	</tr>
				    		 	<?php
				    		 } 
				    	?>
				    </tbody>
				  </table>
				</div>

				<ul class="pagination">
			    <li>
			      <a class="<?php if($current == '1'){ echo "disabled";} ?>" href="?p=<?php if($current != '1'){echo $current-1;}else{ echo $current;} ?>" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    	<?php
			    		for ($i=1; $i <= $nbPage ; $i++) {

			    			if ($i == $current) {
				    			?>
				    				<li class="active"><a href="?p=<?= $i ?>"><?= $i ?></a></li>
				    		 	<?php
			    			}else{
			    				?>
				    				<li><a href="?p=<?= $i ?>"><?= $i ?></a></li>
				    		 	<?php
			    			}
			    		 	
			    		 } 
			    	?>
			    <li>
			      <a class="<?php if($current == '1'){ echo "disabled";} ?>" href="?p=<?php if($current != $nbPage){echo $current+1;}else{ echo $nbPage;} ?>" aria-label="Previous">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
			</div>
		</div>
	</div>
</body>
</html>