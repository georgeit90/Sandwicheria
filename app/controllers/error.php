<?php
class Error extends Controller {
	function __construct() {
		parent::__construct ();
	}
	function Index() {
		$this->view->msg = 'Error 404: P�gina no encontrada';
		$this->view->render( 'error/index' );
	}
}