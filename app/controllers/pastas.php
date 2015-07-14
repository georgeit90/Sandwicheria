<?php
class Pastas extends Controller {
	function __construct() {
		parent::__construct ();
		$this->view->title='Pastas';
		$this->view->js= array("pastas/js/default.js","pastas/js/gadgets.js");
	    $this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= 'views/layout/';
		$this->view->page= "pasta";
		
	}
	function Index() {
		$this->view->render ( 'pastas/index' );
	}
	function Guardar($ind=false) {
		if($ind==0)
			$this->model->Insertar();
		else
			$this->model->Modificar();
	
	}
	
	function Listar()
	{
		$this->model->Listar();
	}
	
	function Consultar()
	{
		$this->model->Consultar();
	}
	
	function Borrar()
	{
		$this->model->Borrar();
	}
	
	
}
?>