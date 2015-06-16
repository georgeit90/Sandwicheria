<?php
class Cocinero extends Cocina {
	function __construct() {
	  parent::__construct ();
	  $this->view->title='Index';
	}
	
	function Index() {
		$this->view->render ( 'cocinero/index' );
		$this->view->rol ="Cocinero";
	}
	function Logout(){
		session_destroy();
		header('location: ../login');
		exit;
	}
}


