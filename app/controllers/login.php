<?php
class Login extends Controller {
	 function __construct() {
	 	parent::__construct();
	 	$this->view->title="login";
		$this->view->css = array("login/css/singin.css");
	 	$this->view->js= array("login/js/default.js","login/js/gadgets.js");
	 	$this->view->menu= "views/general/menu.php";
	}
	
	function index() {
		$this->view->render ( 'login/index' );		
	}
	function run()
	{
      $this->model->run();
	}
	
}
?>
