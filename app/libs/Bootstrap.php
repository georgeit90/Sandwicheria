<?php
class Bootstrap {
	function __construct() {
		$url = isset($_GET ['url'])? $_GET['url']:null;
		$url = rtrim ( $url, "/" );
		$url = explode ( '/', $url );
		//print_r($url);
		if(empty($url[0])){
			require 'controllers/Index.php';
			$controller= new Index();
			$controller->Index();
			return false;
		}
		//else{
		$file='controllers/' . $url [0] . '.php';
		
		 if (file_exists($file)) {
			require $file;
		}else{
			error();
		} 
		$controller = new $url [0];
		$controller->loadModel($url[0]);
		
		
		if (isset ( $url [2] )) {
			//$controller->Index();
			$controller->$url [1] ( $url [2] );
			
		} else {
			if (isset ( $url [1] )) {
				$controller->$url [1] ();
				//$controller->Index();
			}else{ 
				$controller->Index();
		
			}

		
		}
		
	}
	}
	function error() {
	require 'controllers/error.php';
	$controller = new Error ();
	$controller->Index ();
	return;
}
//}