<?php
class CarnePlatillos extends Controller {
	function __construct() {
		parent::__construct ();
		$this->view->title="Carne Platillo";
		$this->view->js=array("carneplatillos/js/default.js","carneplatillos/js/gadgets.js");
		$this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= 'views/layout/';
		$this->view->page= "carnes";

	}
	function Index() {
		$this->view->render ( "platillos/carnes/index" );
	}
	function Guardar($ind=false) {
		if($ind==0) $this->model->Insertar(); else $this->model->Modificar(); }
		function Listar()
		{ $this->model->Listar(); }
		function Consultar()
		{ $this->model->Consultar(); }
}