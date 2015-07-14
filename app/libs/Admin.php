<?php


class Admin extends Controller {
	function __construct() {
		parent::__construct ();
		$start=Session::init();
		$logged= Session::get("loggedIn");
		$name = Session::get("nombre");
		$rol = Session::get("rol");

		if($logged == false || $rol!=1){
			Session::destroy();
			header('location: login');
			exit;
		}
		$this->view->title='Admin';
		$this->view->name=$name;
		$this->view->rol="Admin";
		$this->view->menu= 'views/layout/admin/menu.php';
		$this->view->layout= 'views/layout/';
		
		
	}
	

	function Logout(){
		session_destroy();
		header('location: ../login');
		exit;
	}
}




