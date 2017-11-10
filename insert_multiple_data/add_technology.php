<?php
require_once('config.php');
session_start();

$tec = $_POST['technology'];

    if(!empty($tec)) 
    {
	$technology="";

	for ($i=0; $i < count($tec); $i++) 
	{ 
	    if($i == count($tec)-1)
	    {
		$technology .=$tec[$i].'.';
	    }
	    else
	    {
		$technology .=$tec[$i].',';
	    }
	}

	$data=$conn->prepare("INSERT INTO technology (technology_name) VALUES(?)");

	// Bind the variables to the parameter as strings. 
	$data->bind_param("s", $technology);

	// Execute the prepared statement.
	$data->execute();

	// Close the prepared statement.
	$data->close();

	$_SESSION['msg']="Add Data Seccess...";
    }
    else
    {
	$_SESSION['msg']="Data Empty...";
    }

    header("location: index.php");
?>