<?php
require "../../functions/main_func.php";

$db->execute("UPDATE comments SET seen ='1' WHERE id='{$_POST['id']}'");
