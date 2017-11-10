<?php
require_once('config.php');
$id = $_POST['id'];

$result = $conn->query("SELECT * FROM city where state_id = '$id'");
	
    if($result->num_rows > 0)
    {
	echo '<option value="">---Select City---</option>';

	// Fetch the table data	
	while ($row = $result->fetch_assoc()) 
	{
	    echo '<option value="'.$row['id'].'">'.$row['city_name'].'</option>';
	}
    }
    else
    {
	echo '<option value="">---No City Found---</option>';
    }
?>