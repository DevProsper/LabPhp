<?php
require_once('config.php');
$text = $_POST['text'];

$result = $conn->query("SELECT * FROM user where user_name LIKE '%$text%'");

	if($result->num_rows > 0){
		echo '<ul class="search_ul">';
		while ($row = $result->fetch_assoc()) 
		{
			echo '<li><a href="">'.$row["user_name"].'</a></li>';
		}
		echo '</ul>';
	}
?>