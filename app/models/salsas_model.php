<?php
class Salsas_Model extends Model {
	function __construct() {
		parent::__construct(); }

		public function Insertar() { 
		$idSalsa=$_POST["idSalsa"];
		$descripcion=$_POST["descripcion"];
		$unidadMedida=$_POST["unidadMedida"];
		$cantidad=$_POST["cantidad"];
		$total=$_POST["total"];

		$sth=$this->db->prepare("INSERT INTO salsa(descripcion,unidadMedida,cantidad,total)VALUES(:descripcion,:unidadMedida,:cantidad,:total)"); 
		$sth->execute(array(":descripcion"=>$descripcion,":cantidad"=>$cantidad,":unidadMedida"=>$unidadMedida,":total"=>$total)); 
	    $data[]=array("idSalsa"=>$this->db->lastInsertId(),"descripcion"=>$descripcion,"cantidad"=>$cantidad,"unidadMedida"=>$unidadMedida,"total"=>$total); 
		echo json_encode($data);
		}
		public function Modificar() {
		$idSalsa=$_POST["idSalsa"];
		$descripcion=$_POST["descripcion"];
		$unidadMedida=$_POST["unidadMedida"];
		$cantidad=$_POST["cantidad"];
		$total=$_POST["total"];

			//$sth= $this->db->prepare("UPDATE t_puesto SET Descripcion ="".$_POST["Descripcion"]."",Estado=".$_POST["Estado"]." where idSalsa =".$_POST["idSalsa"]); $sth->execute(); $data[]=array("id_Puesto"=>$id_Puesto,"Descripcion"=>$Descripcion,"Estado"=>$Estado); echo json_encode($data);
		 }
		public function Listar() {
		$sth = $this->db->prepare("SELECT idSalsa,descripcion,unidadMedida,cantidad,total FROM salsa"); 
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
		 }
		
		public function Consultar() {
		$id= $_POST{"id"}; $sth = $this->db->prepare("SELECT idSalsa,descripcion,unidadMedida,cantidad,total, FROM salsa Where idSalsa =". $id);
		 $sth->execute();
		  while ($row = $sth->fetch()) { $data[]=array("idSalsa"=>$row["idSalsa"],"descripcion"=>$row["descripcion"],"unidadMedida"=>$row["unidadMedida"],"cantidad"=>$row["cantidad"],"total"=>$row["total"], ); } 
		  echo json_encode($data); }
}