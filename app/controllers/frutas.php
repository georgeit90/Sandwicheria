<?php
class Frutas extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title='Frutas';
		$this->view->js= array("frutas/js/default.js","frutas/js/gadgets.js");
		$this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= 'views/layout/';
		$this->view->page= "frutas";
	}
	function Index() {
		$this->view->render ( 'frutas/index' );
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