<?php 

namespace App\Controller;

/**
* 
*/
class PostsController extends AppController
{
	public function __construct(){
		parent::__construct();
		$this->loadModel('Post');
		$this->loadModel('Category');
	}

	public function index(){
		//$posts = App::getInstance()->getTabe('Posts')->last();
		$posts = $this->Post->last();
		$categories = App::getInstance()->getTabe('Categories')->last();
		$this->render('posts.index', compact('posts', 'categories'));
	}

	public function categories(){

	}

	public function edit(){


	}
}