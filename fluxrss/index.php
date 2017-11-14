<?php
header('Content-Type: application/rss+xml');
$pdo = new PDO('mysql:dbname=php_lab;host=localhost', 'root', '');
$articles = $pdo->query('SELECT * FROM posts');
//Il est conseillé d'avoir en maximum 25 données dans un flux
?>
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
	<channel>
		<title>Gestion des fluxRss</title>
		<description>Ceci est un exemple de flux Rss</description>
		<lastBuildDate>Ceci est un exemple de flux Rss</lastBuildDate>
		<link>http://www.google.com</link>
		<?php while($a = $articles->fetch()) {?>
		<item>
			<title><?= $a['titre']; ?></title>
			<description><?= $a['contenu']; ?></description>
			<pubDate>Ceci est un exemple de flux Rss</pubDate>
			<link><?= date(DATE_RSS, strtotime($a['datetime'])) ?></link>
			<image>
				<url>http://www.google.com</url>
				<link>http://www.google.com</link>
			</image>
		</item>
		<?php } ?>
	</channel>
</rss>