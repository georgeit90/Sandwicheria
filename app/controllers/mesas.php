<?php

class Mesas extends Controller {
	function __construct() {
		parent::__construct ();
		$this->view->title="mesa";
		$this->view->js=array("mesas/js/default.js","mesas/js/gadgets.js");
		$this->view->menu= "views/general/menu.php";

    }
   
	function Index(){
	$this->view->render ( "mesas/index" );
	}
	
	function Guardar($ind=false){
	if($ind==0) 
	$this->model->Insertar(); 
	else 
	$this->model->Modificar(); 
	}

	function Listar(){ 
	$this->model->Listar(); 
	}

	function Consultar(){ 
	$this->model->Consultar(); 
	}

	function Borrar(){
	$this->model->Borrar();
	}
	
	function Disponibles(){
	$this->model->Disponibles();
	}
}
