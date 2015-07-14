<?php
class MermaPanes_Model extends Model {
	
	function __construct() {
     parent::__construct(); 

}

	public function Insertar() 
	{ 
	$idMermaPan=$_POST["idMermaPan"];
	$pan=$_POST["pan"];
	$fechaCreacion=$_POST["fechaCreacion"];
	$cantidad=$_POST["cantidad"];

	$sth=$this->db->prepare("INSERT INTO mermapan(pan,fechaCreacion,cantidad)VALUES(:pan,:fechaCreacion,:cantidad)"); 
	$sth->execute(array(":pan"=>$pan,":fechaCreacion"=>$fechaCreacion,":cantidad"=>$cantidad)); 
	$data[]=array("idMermaPan"=>$this->db->lastInsertId(),"pan"=>$pan,"fechaCreacion"=>$fechaCreacion,"cantidad"=>$cantidad); 
	echo json_encode($data);

	}
	public function Modificar() {
		$idMermaPan=$_POST["idMermaPan"];
		$pan=$_POST["pan"];
		$fechaCreacion=$_POST["fechaCreacion"];
		$cantidad=$_POST["cantidad"];

	//$sth= $this->db->prepare("UPDATE t_puesto SET Descripcion ="".$_POST["Descripcion"]."",Estado=".$_POST["Estado"]." where idMermaPan =".$_POST["idMermaPan"]); $sth->execute(); $data[]=array("id_Puesto"=>$id_Puesto,"Descripcion"=>$Descripcion,"Estado"=>$Estado); echo json_encode($data); 
	}
	public function Listar() {
		$sth = $this->db->prepare("SELECT idMermaPan, pan, fechaCreacion, cantidad FROM mermapan"); 
		$sth->execute(); 
		$data= $sth->fetchAll();
		echo json_encode($data);
	}
	public function Consultar() {
		$id= $_POST{"id"}; 
		$sth = $this->db->prepare("SELECT idMermaPan,pan,fechaCreacion,cantidad, FROM mermapan Where idMermaPan =". $id); 
		$sth->execute(); 
		while ($row = $sth->fetch()) { 
		$data[]=array("idMermaPan"=>$row["idMermaPan"],"pan"=>$row["pan"],"fechaCreacion"=>$row["fechaCreacion"],"cantidad"=>$row["cantidad"], ); 
		}
		 echo json_encode($data); 
	}

}