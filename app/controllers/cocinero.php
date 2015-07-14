<?php
class Cocinero extends Cocina {
	function __construct() {
	  parent::__construct ();
	  $this->view->title='Index';
	  $this->view->js = array("salonero/js/default.js","salonero/js/gadgets.js");
	  $this->view->page= "Cocinero";
	}
	
	function Index() {
		$this->view->render ( 'cocinero/index' );

	}
	function Logout(){
		session_destroy();
		header('location: ../login');
		exit;
	}
}


