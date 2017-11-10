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
        $technology .=$tec[$i].'';
      }
      else
      {
        $technology .=$tec[$i].',';
      }
    }

    $data=$conn->prepare("UPDATE technology SET technology_name=? WHERE id=?");

    // Bind the variables to the parameter as strings. 
    $data->bind_param('si', $technology, $_POST['id']);

    // Execute the prepared statement.
    $data->execute();

    // Close the prepared statement.
    $data->close();

    $_SESSION['msg']="Update Data Seccess...";
  }
  else
  {
    $_SESSION['msg']="Data Empty...";
  }

  header("location: show.php?id=".$_POST['id']);
?>