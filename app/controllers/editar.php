<?php
 class Editar extends Admin {
	function __construct() {
		parent::__construct ();
				
	}

	
	function Platillos($id = false){
		
		require ("controllers/platillos.php");
		$miPlatillo= new Platillos();
		$miPlatillo->Edit();
	
		
	}
	
	
}
?>