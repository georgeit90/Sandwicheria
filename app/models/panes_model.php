<?php
class Panes_Model extends Model {
	function __construct() {
		parent::__construct(); }

		public function Insertar() {
		$idPan=$_POST["idPan"];
		$descripcion=$_POST["descripcion"];
		$unidadMedida=$_POST["unidadMedida"];
		$cantidad=$_POST["cantidad"];

		$sth=$this->db->prepare("INSERT INTO pan(descripcion,unidadMedida,cantidad)VALUES(:descripcion,:unidadMedida,:cantidad)"); 
		$sth->execute(array(":descripcion"=>$descripcion,":cantidad"=>$cantidad,":unidadMedida"=>$unidadMedida));
		$data[]=array("idPan"=>$this->db->lastInsertId(),"descripcion"=>$descripcion,"cantidad"=>$cantidad,"unidadMedida"=>$unidadMedida);
		echo json_encode($data);
		}
		
		public function Modificar() {
		$idPan=$_POST["idPan"];
		$descripcion=$_POST["descripcion"];
		$unidadMedida=$_POST["unidadMedida"];
		$cantidad=$_POST["cantidad"];

		//sth= $this->db->prepare("UPDATE t_puesto SET Descripcion ="".$_POST["Descripcion"]."",Estado=".$_POST["Estado"]." where idPan =".$_POST["idPan"]); $sth->execute(); $data[]=array("id_Puesto"=>$id_Puesto,"Descripcion"=>$Descripcion,"Estado"=>$Estado); echo json_encode($data);
		 }
		public function Listar() {
		$sth = $this->db->prepare("SELECT idPan,descripcion,unidadMedida,cantidad FROM pan");
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
		}
		
		public function Consultar() {
		$id= $_POST{"id"}; $sth = $this->db->prepare("SELECT idPan,descripcion,unidadMedida,cantidad, FROM pan Where idPan =". $id); 
		$sth->execute(); 
		while ($row = $sth->fetch()) { $data[]=array("idPan"=>$row["idPan"],"descripcion"=>$row["descripcion"],"unidadMedida"=>$row["unidadMedida"],"cantidad"=>$row["cantidad"], ); 
		}
		 echo json_encode($data);
		}
}