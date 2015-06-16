<?php

class Carnes_Model extends Model {
	function __construct() 
	{
	parent::__construct(); 
	}
	
		public function Insertar() { 
		$idCarne=$_POST["idCarne"];
		$descripcion=$_POST["descripcion"];
		$cantidad=$_POST["cantidad"];
		$unidadMedida=$_POST["unidadMedida"];
	
	    $sth=$this->db->prepare("INSERT INTO carne (descripcion,cantidad,unidadMedida ) VALUES(:descripcion,:cantidad,:unidadMedida )"); 
	    $sth->execute(array(":descripcion"=>$descripcion,":cantidad"=>$cantidad,":unidadMedida"=>$unidadMedida)); 
	    $data[]=array("idCarne"=>$this->db->lastInsertId(),"descripcion"=>$descripcion,"cantidad"=>$cantidad,"unidadMedida"=>$unidadMedida);

	    echo json_encode($data); 
		
		}
		
		public function Modificar() {
		$idCarne=$_POST["idCarne"];
		$descripcion=$_POST["descripcion"];
		$cantidad=$_POST["cantidad"];
		$unidadMedida=$_POST["unidadMedida"];
	
		$sth= $this->db->prepare("UPDATE Carne SET descripcion ='".$descripcion."' ,cantidad =".$canditad."' ,unidadMedid =".$unidadMedida." where idCarne=".$idCarne); 
		$sth->execute(); 
		$data[]=array("idCarne"=>$idCarne,"descripcion"=>$descripcion,"cantidad"=>$cantidad,"unidadMedida"=>$unidadMedida);
		echo json_encode($data); }
		
		public function Listar() {
		$sth = $this->db->prepare("SELECT idCarne, descripcion, cantidad, unidadMedida FROM carne");
	    $sth->execute(); 
	    
	    while ($row = $sth->fetch()) { 
	    $data[]=array("idCarne"=>$row["idCarne"],"descripcion"=>$row["descripcion"],"cantidad"=>$row["cantidad"],"unidadMedida"=>$row["unidadMedida"] ); 
	    }
	    
		echo json_encode($data); 
		}
	
		public function Consultar() {
		$id= $_POST{"id"}; 
		$sth = $this->db->prepare("SELECT idCarne, descripcion, cantidad, unidadMedida FROM carne Where idCarne =". $id); 
		$sth->execute();  
		while ($row = $sth->fetch()) { 
			$data[]=array("idCarne"=>$row["idCarne"],"descripcion"=>$row["descripcion"],"cantidad"=>$row["cantidad"],"unidadMedida"=>$row["unidadMedida"], ); 
		} 
		echo json_encode($data); 
		}
		
		public function Borrar()
		{
			$id= $_POST{"id"};
			$sth = $this->db->prepare("DELETE FROM `carne` WHERE idCarne =". $id);
			$sth->execute();
			echo json_encode($id);
				
		}
	}
