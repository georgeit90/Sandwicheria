<?php
class MermaVegetales extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title='Mermas Vegetales';
		$this->view->js= array("mermas/vegetales/js/default.js","mermas/vegetales/js/gadgets.js");
		$this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= 'views/layout/';
		$this->view->page= "../vegetales";
	}
	function Index() {
		$this->view->render ( 'mermas/vegetales/index' );
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