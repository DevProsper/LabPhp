<?php 

if ($page == 'posts') {
	$controller = new PostsController();
	$controller->index();
}else if ($page == 'posts.edit') {
	$controller = new PostsController();
	$controller->edit();
}