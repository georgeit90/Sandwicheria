<?php
class Salonero extends Salon {
	function __construct() {
	  parent::__construct ();
	  $this->view->title='Index';
	  $this->view->js = array("salonero/js/default.js","salonero/js/gadgets.js");
	  $this->view->page= "Salonero";
   	
	}
	
	function Index() {
		$this->view->render ( 'salonero/index' );
	}
	function Logout(){
		session_destroy();
		header('location: ../login');
		exit;
	}
}


