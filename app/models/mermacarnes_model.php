<?php
class Mermacarnes_Model extends Model {
	function __construct() {
		parent::__construct(); }

		public function Insertar() { $idMermaCarne=$_POST["idMermaCarne"];
		$carne=$_POST["carne"];
		$cantidad=$_POST["cantidad"];
		$fechaCreacion=$_POST["fechaCreacion"];

		$sth=$this->db->prepare("INSERT INTO mermacarne(carne,cantidad,fechaCreacion)VALUES(:carne,:cantidad,:fechaCreacion)");

		$sth->execute(array(":carne"=>$carne,":fechaCreacion"=>$fechaCreacion,":cantidad"=>$cantidad));
		$data[]=array("idMermaCarne"=>$this->db->lastInsertId(),"carne"=>$carne,"fechaCreacion"=>$fechaCreacion,"cantidad"=>$cantidad);
	    echo json_encode($data);
	    }
		
		public function Modificar() {
		$idMermaCarne=$_POST["idMermaCarne"];
		$carne=$_POST["carne"];
		$cantidad=$_POST["cantidad"];
		$fechaCreacion=$_POST["fechaCreacion"];

		//$sth= $this->db->prepare("UPDATE t_puesto SET Descripcion ="".$_POST["Descripcion"]."",Estado=".$_POST["Estado"]." where idMermaCarne =".$_POST["idMermaCarne"]); $sth->execute(); $data[]=array("id_Puesto"=>$id_Puesto,"Descripcion"=>$Descripcion,"Estado"=>$Estado); echo json_encode($data);
		}
		public function Listar() {
		$sth = $this->db->prepare("SELECT idMermaCarne,carne,cantidad,fechaCreacion FROM mermacarne"); 
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data); 
		}
		
		public function Consultar() {
		$id= $_POST{"id"}; $sth = $this->db->prepare("SELECT idMermaCarne,carne,cantidad,fechaCreacion, FROM mermacarne Where idMermaCarne =". $id); $sth->execute(); while ($row = $sth->fetch()) { $data[]=array("idMermaCarne"=>$row["idMermaCarne"],"carne"=>$row["carne"],"cantidad"=>$row["cantidad"],"fechaCreacion"=>$row["fechaCreacion"], );
		} 
		echo json_encode($data); }
}