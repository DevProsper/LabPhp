<?php
header('Content-Type: text/csv;');
header('Content-Disposition: attachment; filename="Export tp.csv"');
$dbhost = 'localhost';
$dbname = 'androidtest';
$dbuser = 'root';
$dbpswd = '';

try {
    $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpswd,
    	array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
    		  PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
    		  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ)
    	);
} catch (PDException $e) {
    echo $e;
}

$req = $db->prepare("SELECT id,name,content FROM posts");
$req->execute();
$data = $req->fetchAll();
//print_r($data);
?>"ID";"Titre";"Contenu"<?php
foreach ($data as $d) {
	echo "\n".'"'.$d->id.'";"'.$d->name.'";"'.$d->content.'"';
}
?>