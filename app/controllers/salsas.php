<?php
class Salsas extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title='Salsas';
		$this->view->js= array("salsas/js/default.js","salsas/js/gadgets.js");
		$this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= 'views/layout/';
		$this->view->page= "salsas";
	}
	function Index() {
		$this->view->render ( 'salsas/index' );
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
