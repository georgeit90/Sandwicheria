<?php
class Dashboard extends Admin {
	function __construct() {
	  parent::__construct ();
	  $this->view->title='Dashboard';
	}
	
	function Index() {
		$this->view->render ( 'dashboard/index' );
	}
	function Logout(){
		session_destroy();
		header('location: ../login');
		exit;
	}
}


