<?php 
namespace Core\Controller;

/**
*  
*/
class Controller
{
	protected $viewPath;
	protected $template;

	public function render($view, $variables = []){
		ob_start();
		//pour elargir la portée des variables
		extract($variables);
		require($this->viewPath . str_replace('.', '/', $view) . '.php');
		$content = ob_get_clean();
		require ($this->viewPath . 'templates/' . $this->template. '.php');
	}	
}