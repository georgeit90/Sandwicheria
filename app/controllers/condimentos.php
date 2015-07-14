<?php
class Condimentos extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title='Condimentos';
		$this->view->js= array("condimentos/js/default.js","condimentos/js/gadgets.js");
		$this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= 'views/layout/';
		$this->view->page= "condimentos";
	}
	function Index() {
		$this->view->render ( 'condimentos/index' );
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
