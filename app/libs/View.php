<?php
class View {
	function __construct() {
	}
	
	public function render($name){
	 	
	  require 'views/general/header.php';
	  require 'views/' .$name. '.php';
	  require 'views/general/footer.php';
	}
}
?>