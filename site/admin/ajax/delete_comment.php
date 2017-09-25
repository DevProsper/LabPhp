<?php
require "../../functions/main_func.php";

$db->execute("DELETE FROM comments WHERE id='{$_POST['id']}'");
