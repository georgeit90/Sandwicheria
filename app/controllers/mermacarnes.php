<?php
class MermaCarnes extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title='Mermas Carnes';
		$this->view->js= array("mermas/carnes/js/default.js","mermas/carnes/js/gadgets.js");
		$this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= 'views/layout/';
		$this->view->page= "../carnes";
	}
	function Index() {
		$this->view->render ( 'mermas/carnes/index' );
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