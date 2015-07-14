<?php
class Platos extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title='Platos';
		$this->view->js= array("platos/js/default.js","platos/js/gadgets.js");
		$this->view->menu= 'views/layout/admin/menu.php';
		$this->view->layout= 'views/layout/';
		$this->view->page= "platos";
		
	}
	function Index() {
		$this->view->render ( 'platos/index' );
	}
	
	function Sandwiches() {
	
		$this->view->title='Sandwiches';
		
		$this->view->render ( 'platos/sandwiches/index' );
		
	}
	function Carnes() {
	
		$this->view->title='Carnes';
		$this->view->js= array("platos/carnes/js/default.js","platos/carnes/js/gadgets.js");
		$this->view->render ( 'platos/carnes/index' );
	
	}
}
?>