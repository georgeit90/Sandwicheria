<?php

class Vegetales_Model extends Model {
	function __construct() 
	{
	parent::__construct(); 
	}
	
		public function Insertar() { 
		$idVegetal=$_POST["idVegetal"];
		$descripcion=$_POST["descripcion"];
		$cantidad=$_POST["cantidad"];
		$unidadMedida=$_POST["unidadMedida"];
	
	    $sth=$this->db->prepare("INSERT INTO vegetal (descripcion,cantidad,unidadMedida ) VALUES(:descripcion,:cantidad,:unidadMedida )"); 
	    $sth->execute(array(":descripcion"=>$descripcion,":cantidad"=>$cantidad,":unidadMedida"=>$unidadMedida)); 
	    $data[]=array("idVegetal"=>$this->db->lastInsertId(),"descripcion"=>$descripcion,"cantidad"=>$cantidad,"unidadMedida"=>$unidadMedida);

	    echo json_encode($data); 
		
		}
		
		public function Modificar() {
		$idVegetal=$_POST["idCarne"];
		$descripcion=$_POST["descripcion"];
		$cantidad=$_POST["cantidad"];
		$unidadMedida=$_POST["unidadMedida"];
	
		$sth= $this->db->prepare("UPDATE Carne SET descripcion ='".$descripcion."' ,cantidad =".$canditad."' ,unidadMedid =".$unidadMedida." where idCarne=".$idVegetal); 
		$sth->execute(); 
		$data[]=array("idCarne"=>$idVegetal,"descripcion"=>$descripcion,"cantidad"=>$cantidad,"unidadMedida"=>$unidadMedida);
		echo json_encode($data); }
		
		public function Listar() {
		$sth = $this->db->prepare("SELECT idVegetal, descripcion, cantidad, unidadMedida FROM vegetal");
	    $sth->execute(); 
	    $data= $sth->fetchAll();
		echo json_encode($data); 
		}
	
		public function Consultar() {
		$id= $_POST{"id"}; 
		$sth = $this->db->prepare("SELECT idVegetal, descripcion, cantidad, unidadMedida FROM carne Where Vegetal =". $id); 
		$sth->execute();  
		while ($row = $sth->fetch()) { 
			$data[]=array("idCarne"=>$row["idCarne"],"descripcion"=>$row["descripcion"],"cantidad"=>$row["cantidad"],"unidadMedida"=>$row["unidadMedida"], ); 
		} 
		echo json_encode($data); 
		}
		
		public function Borrar()
		{
			$id= $_POST{"id"};
			$sth = $this->db->prepare("DELETE FROM `carne` WHERE idVegetal =". $id);
			$sth->execute();
			echo json_encode($id);
				
		}
	}
