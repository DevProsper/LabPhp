<?php if (!isset($_SESSION['Auth'])) {
	header("Location:index.php?page=login");
}
?>