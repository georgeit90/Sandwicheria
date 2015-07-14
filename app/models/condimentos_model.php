<?php
class Condimentos_Model extends Model {
	function __construct() {
		parent::__construct(); }

		public function Insertar() { 
		$idCondimento=$_POST["idCondimento"];
		$descripcion=$_POST["descripcion"];
		$unidadMedida=$_POST["unidadMedida"];
		$cantidad=$_POST["cantidad"];

		$sth=$this->db->prepare("INSERT INTO condimento(descripcion,unidadMedida,cantidad)VALUES(:descripcion,:unidadMedida,:cantidad)"); 
		$sth->execute(array(":descripcion"=>$descripcion,":cantidad"=>$cantidad,":unidadMedida"=>$unidadMedida)); 
	    $data[]=array("idCondimento"=>$this->db->lastInsertId(),"descripcion"=>$descripcion,"cantidad"=>$cantidad,"unidadMedida"=>$unidadMedida); 
		echo json_encode($data); 
		}
		
		public function Modificar() {
		$idCondimento=$_POST["idCondimento"];
		$descripcion=$_POST["descripcion"];
		$unidadMedida=$_POST["unidadMedida"];
		$cantidad=$_POST["cantidad"];

	   //$sth= $this->db->prepare("UPDATE t_puesto SET Descripcion ="".$_POST["Descripcion"]."",Estado=".$_POST["Estado"]." where idCondimento =".$_POST["idCondimento"]); $sth->execute(); $data[]=array("id_Puesto"=>$id_Puesto,"Descripcion"=>$Descripcion,"Estado"=>$Estado); echo json_encode($data);
		 }
	   
	   public function Listar() {
	   $sth = $this->db->prepare("SELECT idCondimento,descripcion,unidadMedida,cantidad FROM condimento"); 
	   $sth->execute(); 
	   $data=$sth->fetchAll();
	   echo json_encode($data);
	    }
	    public function Consultar() {
		$id= $_POST{"id"}; 
		$sth = $this->db->prepare("SELECT idCondimento,descripcion,unidadMedida,cantidad, FROM condimento Where idCondimento =". $id); $sth->execute(); while ($row = $sth->fetch()) 
		{ $data[]=array("idCondimento"=>$row["idCondimento"],"descripcion"=>$row["descripcion"],"unidadMedida"=>$row["unidadMedida"],"cantidad"=>$row["cantidad"], ); 
		} echo json_encode($data); }
}