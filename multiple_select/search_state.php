<?php
require_once('config.php');
$id = $_POST['id'];

$result = $conn->query("SELECT * FROM state where country_id = '$id'");
	
    if($result->num_rows > 0)
    {
        echo '<option value="">---Sélectionner l\'état---</option>';

	// Fetch the table data	
	while ($row = $result->fetch_assoc()) 
	{
	    echo '<option value="'.$row['id'].'">'.$row['state_name'].'</option>';
	}
    }
    else
    {
	echo '<option value="">---Etat non trouvé---</option>';
    }
?>