<?php
 class Agregar extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title='Agregar';
		$this->view->js= array("mermas/js/default.js","mermas/js/gadgets.js");
		$this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= 'views/layout/';
		$this->view->page= "mermas";
	}
	function Index() {
		$this->view->render ( 'mermas/index' );
	}
	
	function Platillos(){
		
		require ("controllers/platillos.php");
		$miCarne= new Platillos();
		$miCarne->Add();
	}
	
	
}
?>