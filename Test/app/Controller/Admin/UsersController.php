<?php 

namespace App\Admin\Controller;
use Core\Controller;

/**
* 
*/
class AppController extends Controller
{

	public function login(){
		$errors = false;
		if (!empty($_POST)) {
			
		}else{
			$errors = true;
		}
		$this->render('users.login', compact('form', 'success'));
	}
	/*
	dans le fichier login.php
	if($errors){
	on creer une div pour lister les erreurs
	}

	*/
}