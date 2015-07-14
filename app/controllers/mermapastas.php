<?php
class MermaPastas extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title='Mermas Pastas';
		$this->view->js= array("mermas/pastas/js/default.js","mermas/pastas/js/gadgets.js");
		$this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= 'views/layout/';
		$this->view->page= "../pastas";
	}
	function Index() {
		$this->view->render ( 'mermas/pastas/index' );
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