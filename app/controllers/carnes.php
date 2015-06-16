<?php
class Carnes extends Controller {
	function __construct() {
		parent::__construct ();
		$this->view->title='Carnes';
		$this->view->js= array("carnes/js/default.js","carnes/js/gadgets.js");
		$this->view->menu= 'views/general/menu.php';
		$this->view->layout= 'views/layout/';
		
	}
	function Index() {
		$this->view->render ( 'carnes/index' );
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