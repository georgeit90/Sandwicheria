<?php
class Error extends Controller {
	function __construct() {
		parent::__construct ();
	}
	function Index() {
		$this->view->msg = 'Error 404: Página no encontrada';
		$this->view->render( 'error/index' );
	}
}