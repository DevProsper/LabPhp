<?php 

namespace App\Controller;
use Core\Controller;

/**
* 
*/
class AppController extends Controller
{
	protected $template = 'default';

	public function __construct(){
		$this->viewPath = ROOT . '/Views/';
	}

	public function loadModel($model_name){
		$this->model_name = App::getInstance()->getTable($model_name);
	}
}