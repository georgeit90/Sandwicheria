<?php
class Panes extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title='Panes';
		$this->view->js= array("panes/js/default.js","panes/js/gadgets.js");
		$this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= 'views/layout/';
		$this->view->page= "panes";
	}
	function Index() {
		$this->view->render ( 'panes/index' );
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