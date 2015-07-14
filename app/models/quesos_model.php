<?php
class Quesos_Model extends Model {
	function __construct() {
		parent::__construct(); }

		public function Insertar() {
		$idQueso=$_POST["idQueso"];
		$descripcion=$_POST["descripcion"];
		$unidadMedida=$_POST["unidadMedida"];
		$cantidad=$_POST["cantidad"];

		$sth=$this->db->prepare("INSERT INTO queso(descripcion,unidadMedida,cantidad)VALUES(:descripcion,:unidadMedida,:cantidad)"); 
		$sth->execute(array(":descripcion"=>$descripcion,":cantidad"=>$cantidad,":unidadMedida"=>$unidadMedida)); 
	    $data[]=array("idQueso"=>$this->db->lastInsertId(),"descripcion"=>$descripcion,"cantidad"=>$cantidad,"unidadMedida"=>$unidadMedida); 
		echo json_encode($data); 
		}
		 
		public function Modificar() {
			$idQueso=$_POST["idQueso"];
			$descripcion=$_POST["descripcion"];
			$unidadMedida=$_POST["unidadMedida"];
			$cantidad=$_POST["cantidad"];

		//$sth= $this->db->prepare("UPDATE t_puesto SET Descripcion ="".$_POST["Descripcion"]."",Estado=".$_POST["Estado"]." where idQueso =".$_POST["idQueso"]); $sth->execute(); $data[]=array("id_Puesto"=>$id_Puesto,"Descripcion"=>$Descripcion,"Estado"=>$Estado); echo json_encode($data);
		 }
		public function Listar() {
		$sth = $this->db->prepare("SELECT idQueso, descripcion, unidadMedida, cantidad FROM queso");
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data); 
		}
		
		public function Consultar() {
		$id= $_POST{"id"}; 
		$sth = $this->db->prepare("SELECT idQueso,descripcion,unidadMedida,cantidad, FROM queso Where idQueso =". $id); $sth->execute(); 
		while ($row = $sth->fetch()) { 
		$data[]=array("idQueso"=>$row["idQueso"],"descripcion"=>$row["descripcion"],"unidadMedida"=>$row["unidadMedida"],"cantidad"=>$row["cantidad"], ); }
		 echo json_encode($data);
		 }
}