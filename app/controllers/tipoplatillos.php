<?php
class TipoPlatillos extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title='Tipo Platillos';
		$this->view->js= array("tipoplatillos/js/default.js","tipoplatillos/js/gadgets.js");
		$this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= 'views/layout/';
		$this->view->page= "tipoplatillos";
	}
	function Index() {
		$this->view->render ( 'tipoplatillos/index' );
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