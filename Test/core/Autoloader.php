<?php 
namespace Core;

class Autoloader{
	/*
	*Enregistre notre Autoload
	*@package App
	*/

	static function register(){
		spl_autoload_register(array(__CLASS__,'autoload'));
	}
	/*
	*Inclue le fichier correspond a notre classe
	* @param string le nom de la classe
	*/

	static function autoload($ma_class){
		if (stripos($ma_class, __NAMESPACE__ . '\\') === 0) {
			$ma_class = str_replace(__NAMESPACE__ . '\\', '', $ma_class);
			$ma_class = str_replace('\\', '/', $ma_class);
			//DIR contient le nom du dossier parent (App)
			require __DIR__ .'/' . $ma_class . '.php';
		}
	}

	public static function getTitle($title){
		echo $title;
	}
}s