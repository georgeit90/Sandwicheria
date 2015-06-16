<?php
class Index extends Controller {
	function __construct() {
		parent::__construct ();
		$this->view->title='Index';
		$this->view->menu= 'views/general/menu.php';
		$this->view->layout= 'views/layout/';
	}
	function Index() {
		$this->view->render ( 'index/index' );
	}
}
?>