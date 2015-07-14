<?php
class Mermapastas_Model extends Model {
	function __construct() {
		parent::__construct(); }

		public function Insertar() { 
		$idMermaPasta=$_POST["idMermaPasta"];
		$pasta=$_POST["pasta"];
		$fechaCreacion=$_POST["fechaCreacion"];
		$cantidad=$_POST["cantidad"];

		$sth=$this->db->prepare("INSERT INTO mermapasta(pasta,fechaCreacion,cantidad)VALUES(:pasta,:fechaCreacion,:cantidad)"); 
		$sth->execute(array(":pasta"=>$pasta,":fechaCreacion"=>$fechaCreacion,":cantidad"=>$cantidad));
		$data[]=array("idMermaPasta"=>$this->db->lastInsertId(),"pasta"=>$pasta,"fechaCreacion"=>$fechaCreacion,"cantidad"=>$cantidad);
		
		echo json_encode($data); 
		}
		
		public function Modificar() {
		$idMermaPasta=$_POST["idMermaPasta"];
		$pasta=$_POST["pasta"];
		$fechaCreacion=$_POST["fechaCreacion"];
		$cantidad=$_POST["cantidad"];

		//$sth= $this->db->prepare("UPDATE t_puesto SET Descripcion ="".$_POST["Descripcion"]."",Estado=".$_POST["Estado"]." where idMermaPasta =".$_POST["idMermaPasta"]); $sth->execute(); $data[]=array("id_Puesto"=>$id_Puesto,"Descripcion"=>$Descripcion,"Estado"=>$Estado); 
		echo json_encode($data); 
		}
		
		public function Listar() {
		$sth = $this->db->prepare("SELECT idMermaPasta,pasta,fechaCreacion,cantidad FROM mermapasta"); 
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data); 
		}
		
		public function Consultar() {
					$id= $_POST{"id"}; $sth = $this->db->prepare("SELECT idMermaPasta,pasta,fechaCreacion,cantidad, FROM mermapasta Where idMermaPasta =". $id); $sth->execute(); while ($row = $sth->fetch()) { $data[]=array("idMermaPasta"=>$row["idMermaPasta"],"pasta"=>$row["pasta"],"fechaCreacion"=>$row["fechaCreacion"],"cantidad"=>$row["cantidad"], ); } echo json_encode($data); }
}