<?php
class Mermavegetales_Model extends Model {
function __construct() {
parent::__construct(); }

public function Insertar() { 
$idMermaVegetal=$_POST["idMermaVegetal"];
$fechaCreacion=$_POST["fechaCreacion"];
$vegetal=$_POST["vegetal"];
$cantidad=$_POST["cantidad"];

$sth=$this->db->prepare("INSERT INTO mermavegetal(fechaCreacion,vegetal,cantidad)VALUES(:fechaCreacion,:vegetal,:cantidad)"); 
$sth->execute(array(":vegetal"=>$vegetal,":fechaCreacion"=>$fechaCreacion,":cantidad"=>$cantidad));
$data[]=array("idMermaVegetal"=>$this->db->lastInsertId(),"vegetal"=>$vegetal,"fechaCreacion"=>$fechaCreacion,"cantidad"=>$cantidad);
echo json_encode($data); 
}

public function Modificar() {
$idMermaVegetal=$_POST["idMermaVegetal"];
$fechaCreacion=$_POST["fechaCreacion"];
$vegetal=$_POST["vegetal"];
$cantidad=$_POST["cantidad"];

//$sth= $this->db->prepare("UPDATE t_puesto SET Descripcion ="".$_POST["Descripcion"]."",Estado=".$_POST["Estado"]." where idMermaVegetal =".$_POST["idMermaVegetal"]); $sth->execute(); $data[]=array("id_Puesto"=>$id_Puesto,"Descripcion"=>$Descripcion,"Estado"=>$Estado); echo json_encode($data);
 }
public function Listar() {
$sth = $this->db->prepare("SELECT idMermaVegetal,fechaCreacion,vegetal,cantidad FROM mermavegetal");
$sth->execute(); 
$data=$sth->fetchAll(); 
echo json_encode($data); 
}
public function Consultar() {
$id= $_POST{"id"}; 
$sth = $this->db->prepare("SELECT idMermaVegetal,fechaCreacion,vegetal,cantidad, FROM mermavegetal Where idMermaVegetal =". $id); 
$sth->execute(); 
while ($row = $sth->fetch()) { 
$data[]=array("idMermaVegetal"=>$row["idMermaVegetal"],"fechaCreacion"=>$row["fechaCreacion"],"vegetal"=>$row["vegetal"],"cantidad"=>$row["cantidad"], ); 
}
 echo json_encode($data); }
}