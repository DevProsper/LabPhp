<?php
require 'Form.php';
$form = new Form();
$d = array(
    'email' => 'contact@gmail.com'
);
$form->set($d);
if (isset($_POST['data'])) {
    $errors = array(
        'email' => 'Erreur du champ'
    );
    $form->setErros($errors);
}
?>

<form action="index.php" method="post">
    <?= $form->input('email', 'Votre email', array('class' => 'bootstrap-form')); ?>
    <?= $form->file('email', 'Votre email' )?>
    <?= $form->hidden('')?>
    <?= $form->select('Choisissez', '', '')?>
    <input type="submit" name="" value="Soumettre">
</form>
