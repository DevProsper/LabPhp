<?php
include 'includes.php';
$form = new Forme("POST");
echo $form->create("GET");
echo $form->input("email");
echo $form->submit('Envoyer');
echo $form->end();
?>
 	