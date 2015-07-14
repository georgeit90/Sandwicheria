<?php
class MermaPanes extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title='Mermas Panes';
		$this->view->js= array("mermas/panes/js/default.js","mermas/panes/js/gadgets.js");
		$this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= 'views/layout/';
		$this->view->page= "../panes";
	}
	function Index() {
		$this->view->render ( 'mermas/panes/index' );
	}
	function Guardar($ind=false) {
		if($ind==0)
			$this->model->Insertar();
		else
			$this->model->Modificar();
	
	}
	
	function Listar()
	{
		$this->model->Listar();
	}
	
	function Consultar()
	{
		$this->model->Consultar();
	}
	
	function Borrar()
	{
		$this->model->Borrar();
	}
	
	
}
?>