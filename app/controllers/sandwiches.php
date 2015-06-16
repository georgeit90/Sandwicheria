<?php
class Sandwiches extends Controller {
	function __construct() {
		parent::__construct ();
		$this->view->title='Sandwiches';
		$this->view->menu= 'views/general/menu.php';
		$this->view->layout= 'views/layout/';
	}
	function Index() {
		$this->view->render ( 'sandwiches/index' );
	}
	
	
}
?>