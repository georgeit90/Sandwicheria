<?php
class MermaFrutas extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title='Mermas Frutas';
		$this->view->js= array("mermas/frutas/js/default.js","mermas/frutas/js/gadgets.js");
		$this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= 'views/layout/';
		$this->view->page= "../frutas";
	}
	function Index() {
		$this->view->render ( 'mermas/frutas/index' );
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