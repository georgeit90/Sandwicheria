<?php
class Cajero extends Caja {
	function __construct() {
	  parent::__construct ();
	  $this->view->title='Index';
	  $this->view->js = array("salonero/js/default.js","salonero/js/gadgets.js");
	  $this->view->page= "Cajero";
	}
	
	function Index() {
		$this->view->render ( 'cajero/index' );

	}
	function Logout(){
		session_destroy();
		header('location: ../login');
		exit;
	}
}


