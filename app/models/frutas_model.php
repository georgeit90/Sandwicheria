<?php
class Frutas_Model extends Model {
	function __construct() {
		parent::__construct(); }

		public function Insertar() {
		$idFruta=$_POST["idFruta"];
		$unidadMedida=$_POST["unidadMedida"];
		$cantidad=$_POST["cantidad"];
		$descripcion=$_POST["descripcion"];

		$sth=$this->db->prepare("INSERT INTO fruta(unidadMedida,cantidad,descripcion)VALUES(:unidadMedida,:cantidad,:descripcion)"); 
	    $sth->execute(array(":descripcion"=>$descripcion,":cantidad"=>$cantidad,":unidadMedida"=>$unidadMedida)); 
	    $data[]=array("idFruta"=>$this->db->lastInsertId(),"descripcion"=>$descripcion,"cantidad"=>$cantidad,"unidadMedida"=>$unidadMedida); 
		echo json_encode($data); 
		}
		public function Modificar() {
			$idFruta=$_POST["idFruta"];
			$unidadMedida=$_POST["unidadMedida"];
			$cantidad=$_POST["cantidad"];
			$descripcion=$_POST["descripcion"];

		//$sth= $this->db->prepare("UPDATE t_puesto SET Descripcion ="".$_POST["Descripcion"]."",Estado=".$_POST["Estado"]." where idFruta =".$_POST["idFruta"]); $sth->execute(); $data[]=array("id_Puesto"=>$id_Puesto,"Descripcion"=>$Descripcion,"Estado"=>$Estado); echo json_encode($data); 
		}
		public function Listar() {
		$sth = $this->db->prepare("SELECT idFruta,unidadMedida,cantidad,descripcion FROM fruta"); 
		$sth->execute(); 
		$data=$sth->fetchAll();
		echo json_encode($data); 
		}
		public function Consultar() {
		$id= $_POST{"id"}; 
		$sth = $this->db->prepare("SELECT idFruta,unidadMedida,cantidad,descripcion, FROM fruta Where idFruta =". $id); $sth->execute();
		 while ($row = $sth->fetch()) { 
		 	$data[]=array("idFruta"=>$row["idFruta"],"unidadMedida"=>$row["unidadMedida"],"cantidad"=>$row["cantidad"],"descripcion"=>$row["descripcion"], ); 
		 }
		  echo json_encode($data);
		}

}