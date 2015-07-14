<?php
class Quesos extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title='Quesos';
		$this->view->js= array("quesos/js/default.js","quesos/js/gadgets.js");
		$this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= 'views/layout/';
		$this->view->page= "quesos";
	}
	function Index() {
		$this->view->render ( 'quesos/index' );
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