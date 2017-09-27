<?php 

/**
* 
*/
class Form
{
	
	static function setTitle($title){
		echo $title;
	}

	function __construct(){
		require 'config.php';
		if (is_array($configs)) {
			foreach ($configs as $config) {
				$compact = compact($config);
			}
		}
	}

}