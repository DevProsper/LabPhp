<?php
use App\App;
use App\Autoloader;
use App\Controller\AppController;
require_once 'app/Autoloader.php';
require_once 'Form.php';
$form = Autoloader::register();

$page = "users";
$page = explode('.', $page);
$controller = ucfirst("prosper") .'s' . 'Controller' . '.php';
var_dump($controller);
?>