<?php
class mermafrutas_Model extends Model {
function __construct() {
parent::__construct(); }

public function Insertar() { 
$idMermaFruta=$_POST["idMermaFruta"];
$fruta=$_POST["fruta"];
$fechaCreacion=$_POST["fechaCreacion"];
$cantidad=$_POST["cantidad"];

$sth=$this->db->prepare("INSERT INTO mermafruta(fruta,fechaCreacion,cantidad)VALUES(:fruta,:fechaCreacion,:cantidad)"); 
$sth->execute(array(":fruta"=>$fruta,":fechaCreacion"=>$fechaCreacion,":cantidad"=>$cantidad)); 
$data[]=array("idMermaFruta"=>$this->db->lastInsertId(),"fruta"=>$fruta,"fechaCreacion"=>$fechaCreacion,"cantidad"=>$cantidad); 
echo json_encode($data); 
}
public function Modificar() {
$idMermaFruta=$_POST["idMermaFruta"];
$fruta=$_POST["fruta"];
$fechaCreacion=$_POST["fechaCreacion"];
$cantidad=$_POST["cantidad"];

//$sth= $this->db->prepare("UPDATE t_puesto SET Descripcion ="".$_POST["Descripcion"]."",Estado=".$_POST["Estado"]." where idMermaFruta =".$_POST["idMermaFruta"]); 
//$sth->execute(); $data[]=array("id_Puesto"=>$id_Puesto,"Descripcion"=>$Descripcion,"Estado"=>$Estado); 
echo json_encode($data); 
}
public function Listar() {
$sth = $this->db->prepare("SELECT idMermaFruta,fruta,fechaCreacion,cantidad FROM mermafruta"); 
$sth->execute();
$data= $sth->fetchAll();
echo json_encode($data); 
}
public function Consultar() {
$id= $_POST{"id"};
$sth = $this->db->prepare("SELECT idMermaFruta,fruta,fechaCreacion,cantidad, FROM mermafruta Where idMermaFruta =". $id); 
$sth->execute(); 
while ($row = $sth->fetch()) { 
$data[]=array("idMermaFruta"=>$row["idMermaFruta"],"fruta"=>$row["fruta"],"fechaCreacion"=>$row["fechaCreacion"],"cantidad"=>$row["cantidad"], );
}
echo json_encode($data); 
}
}