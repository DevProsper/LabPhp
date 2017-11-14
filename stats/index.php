<?php
$pdo = new PDO('mysql:dbname=stats;host=localhost', 'root', '');

$temp_session = 15;
$temp_actuel = date('U');
$user_ip = $_SERVER['REMOTE_ADDR'];

$req_ip_exist = $pdo->prepare('SELECT * FROM online WHERE user_ip = ?');
$req_ip_exist->execute(array($user_ip));
$ip_exist = $req_ip_exist->rowCount();
	if ($ip_exist == 0) {
		$add_ip = $pdo->prepare('INSERT INTO online(user_ip, time) VALUES(?,?)');
		$add_ip->execute(array($user_ip,$temp_actuel));
	}else{
		$update_ip = $pdo->prepare('UPDATE online SET time = ? WHERE user_ip = ?');
		$update_ip->execute(array($user_ip,$temp_actuel));
	}
$session_delete_time = $temp_actuel - $temp_session;
$delete_ip = $pdo->prepare('DELETE FROM online WHERE time < ?');
$delete_ip->execute(array($session_delete_time));

$show_user_nbr = $pdo->query('SELECT * FROM online');
$user_nbr = $show_user_nbr->rowCount();

echo $user_nbr;
?>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

</body>
</html>