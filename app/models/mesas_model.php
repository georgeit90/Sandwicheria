<?php

class Mesas_Model extends Model {
function __construct() {
parent::__construct(); }

public function Insertar() { $idMesa=$_POST["idMesa"];
$cantidadAsientos=$_POST["cantidadAsientos"];
$disponibilidad=$_POST["disponibilidad"];
$piso=$_POST["piso"];
$descripcion=$_POST["descripcion"];

$sth=$this->db->prepare("INSERT INTO mesa(idMesa,cantidadAsientos,disponibilidad,piso,descripcion,)VALUES(:idMesa,:cantidadAsientos,:disponibilidad,:piso,:descripcion,)"); 
$sth->execute(array(":Descripcion"=>$Descripcion,":Estado"=>$Estado)); 
$data[]=array("id_Puesto"=>$this->db->lastInsertId(),"Descripcion"=>$Descripcion,"Estado"=>$Estado);
echo json_encode($data);
 }
 
public function Modificar() {
$idMesa=$_POST["idMesa"];
$cantidadAsientos=$_POST["cantidadAsientos"];
$disponibilidad=$_POST["disponibilidad"];
$piso=$_POST["piso"];
$descripcion=$_POST["descripcion"];

//$sth= $this->db->prepare("UPDATE t_puesto SET Descripcion ="".$_POST["Descripcion"]."",Estado=".$_POST["Estado"]." where idMesa =".$_POST["idMesa"]); 
//$sth->execute(); $data[]=array("id_Puesto"=>$id_Puesto,"Descripcion"=>$Descripcion,"Estado"=>$Estado); 
echo json_encode($data); 
}

public function Listar() {
$sth = $this->db->prepare("SELECT idMesa ,cantidadAsientos ,disponibilidad ,piso ,descripcion FROM mesa"); 
$sth->execute(); 
$data=$sth->fetchAll();
 echo json_encode($data);
 }
public function Consultar() {
$id= $_POST{"id"}; 
$sth = $this->db->prepare("SELECT idMesa,cantidadAsientos,disponibilidad,piso,descripcion FROM mesa Where idMesa = ". $id); 
$sth->execute(); while ($row = $sth->fetch()) 
{ 
$data[]=array("idMesa"=>$row["idMesa"],"cantidadAsientos"=>$row["cantidadAsientos"],"disponibilidad"=>$row["disponibilidad"],"piso"=>$row["piso"],"descripcion"=>$row["descripcion"] ); 
} 
echo json_encode($data); 

}

public function Borrar(){
	
	
}

public function Disponibles(){
$sth = $this->db->prepare("SELECT disponibilidad FROM mesa Where disponibilidad = 0");
$sth->execute(); 
$data= $sth->rowCount();
 echo $data;
}
}
