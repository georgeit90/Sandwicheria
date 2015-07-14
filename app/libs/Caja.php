<?php


class Caja extends Controller {
	function __construct() {
		parent::__construct ();
		$start=Session::init();
		$logged= Session::get("loggedIn");
		$name = Session::get("nombre");
        $rol = Session::get("rol");
		if($logged == false || $rol!=2){
			Session::destroy();
			header('location: login');
			exit;
		}
		$this->view->name =$name;
	    $this->view->rol ="Cajero";
		$this->view->menu = 'views/layout/Cajero/menu.php';
		$this->view->layout= 'views/layout/';
		
	}
	function Index() {	
	}

	function Logout(){
		session_destroy();
		header('location: ../login');
		exit;
	}
}




