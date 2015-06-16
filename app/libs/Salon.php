<?php


class Salon extends Controller {
	function __construct() {
		parent::__construct ();
		$start=Session::init();
		$logged= Session::get("loggedIn");
		$name = Session::get("nombre");
        $rol = Session::get("rol");
		if($logged == false && $rol==4){
			Session::destroy();
			header('location: login');
			exit;
		}
		$this->view->name =$name;
	    $this->view->rol =$rol;
		$this->view->menu = 'views/general/menu.php';
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




