<?php
class Platillos extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title='Platillos';
		$this->view->js= array("platillos/js/default.js","platillos/js/gadgets.js");
		$this->view->menu= 'views/layout/admin/menu.php';
		$this->view->layout= 'views/layout/';
		$this->view->page= "platillos";
		
	}
	function Index() {
		$this->view->render ( 'platillos/index' );
	}
	function Add() {
		$this->view->title='Agregar Platillo';
		$this->view->js= array("agregar/platillo/js/default.js","agregar/platillo/js/gadgets.js");
		$this->view->css= array("agregar/platillo/css/menu.css");
		$this->view->render ( 'agregar/platillo/index' );
	}
	function Edit() {
		$this->view->title='Editar Platillo';
		$this->view->js= array("editar/platillo/js/default.js","editar/platillo/js/gadgets.js");
		$this->view->css= array("editar/platillo/css/menu.css");
		$this->view->render ( 'editar/platillo/index' );
	}
	
	function Guardar($ind=false) {
		if($ind==0){
		$this->model->Insertar();
		}else{
		$this->model->Modificar();
		}
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