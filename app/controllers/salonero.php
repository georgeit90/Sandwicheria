<?php
class Salonero extends Salon {
	function __construct() {
	  parent::__construct ();
	  $this->view->title='Index';
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


