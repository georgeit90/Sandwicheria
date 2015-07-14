<?php

class Orden extends Controller {
	//private $idMesa = $_GET["idMesa"];
	function __construct() {
		parent::__construct ();
		$start=Session::init();
		$logged= Session::get("loggedIn");
		$name = Session::get("nombre");
		$rol = Session::get("rol");

		if($logged == false){
			Session::destroy();
			header('location: login');
			exit;
		}
		$this->view->title="orden";
		$this->view->name=$name;
		$this->view->js=array("orden/js/default.js","orden/js/gadgets.js");
		$this->view->menu= "views/layout/salonero/menu.php";
		$this->view->layout= "views/layout/";
		$this->view->mesa= $_GET["idMesa"];
		$this->view->page= "../orden";

    }
   
  
	
	function Index(){
	$this->view->render ( "orden/index" );
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
	
	function Logout(){
		session_destroy();
		header('location: ../login');
		exit;
	}
}
