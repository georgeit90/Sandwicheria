<?php
 class Mermas extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title='Mermas';
		$this->view->js= array("mermas/js/default.js","mermas/js/gadgets.js");
		$this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= 'views/layout/';
		$this->view->page= "mermas";
	}
	function Index() {
		$this->view->render ( 'mermas/index' );
	}
	
	function Carnes(){
		
		require ("controllers/mermacarnes.php");
		$miCarne= new MermaCarnes();
		$miCarne->Index();
	}
	function Frutas(){
		
	    require ("controllers/mermafrutas.php");
		$miFruta= new MermaFrutas();
		$miFruta->Index();
	}
	function Panes(){
		
		require ("controllers/mermapanes.php");
		$miPan= new MermaPanes();
		$miPan->Index();
	}
	function Pastas(){
		
		require ("controllers/mermapastas.php");
		$miPasta= new MermaPastas();
		$miPasta->Index();
	}
	function Vegetales(){
		
		require ("controllers/mermavegetales.php");
		$miVege= new MermaVegetales();
		$miVege->Index();
	}
	function Salsas(){
		
		require ("controllers/mermasalsas.php");
		$miSalsa= new MermaSalsas();
		$miSalsa->Index();
	}
	
}
?>