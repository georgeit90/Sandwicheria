<?php
class Usuarios extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title="Usuarios";
		$this->view->js= array("usuarios/js/default.js","usuarios/js/gadgets.js");
		$this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= "views/layout/";
		$this->view->page= "usuarios";
		
	}
	
	function Index() {
		$this->view->render ( 'usuarios/index' );
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
