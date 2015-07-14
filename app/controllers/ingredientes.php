<?php
class Ingredientes extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title='Ingredientes';
		//$this->view->js= array("inventario/js/default.js","inventario/js/gadgets.js");
		$this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= 'views/layout/';
		$this->view->page= "ingrediente";
		
	}
	function Index() {
		$this->view->render ( 'ingredientes/index' );
	}
	
}
?>