<?php


class Admin extends Controller {
	function __construct() {
		parent::__construct ();
		$start=Session::init();
		$logged= Session::get("loggedIn");
		$name = Session::get("nombre");
		

		if($logged == false){
			Session::destroy();
			header('location: login');
			exit;
		}
		$this->view->title='Admin';
		$this->view->name=$name;
		$this->view->rol="Admin";
		$this->view->menu= 'views/general/menu.php';
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




