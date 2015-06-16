<?php
class Help extends Controller {
	function __construct() {
		parent::__construct ();
		$this->view->menu= 'views/general/menu.php';
	}
	function Index() {
		$this->view->render ( 'help/index' );
	}
	function other($arg = false) {
		//require 'models/help_model.php';
		$models = new Help_Model ();
		$models->help();
		
	}
}