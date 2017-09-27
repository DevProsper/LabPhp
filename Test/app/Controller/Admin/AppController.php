<?php 

namespace App\Admin\Controller;
use Core\Controller;

/**
* 
*/
class AppController extends Controller
{
	public function __construct(){
		parent::__construct();
		$app = App::getInstance();
		$auth = new DBAuth();
		if (!$auth->logged()) {
			$app->forbidden();
		}
	}
}