<?php
class MermaSalsas extends Admin {
	function __construct() {
		parent::__construct ();
		$this->view->title='Mermas Salsas';
		$this->view->js= array("mermas/salsas/js/default.js","mermas/salsas/js/gadgets.js");
		$this->view->menu= "views/layout/admin/menu.php";
		$this->view->layout= 'views/layout/';
		$this->view->page= "../salsas";
	}
	function Index() {
		$this->view->render ( 'mermas/salsas/index' );
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