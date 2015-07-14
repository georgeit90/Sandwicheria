<?php

class Orden_Model extends Model {
function __construct() {
parent::__construct(); 
}

public function Insertar() { 
$idOrden=$_POST["idOrden"];
$fechaCreacion=$_POST["fechaCreacion"];
$nombreCliente=$_POST["nombreCliente"];
$mesa=$_POST["mesa"];
$usuario=$_POST["usuario"];
$total=$_POST["total"];

$sth=$this->db->prepare("INSERT INTO orden(idOrden,fechaCreacion,nombreCliente,mesa,usuario,total,)VALUES(:idOrden,:fechaCreacion,:nombreCliente,:mesa,:usuario,:total,)"); $sth->execute(array(":Descripcion"=>$Descripcion,":Estado"=>$Estado)); $data[]=array("id_Puesto"=>$this->db->lastInsertId(),"Descripcion"=>$Descripcion,"Estado"=>$Estado); echo json_encode($data); }
public function Modificar() {
$idOrden=$_POST["idOrden"];
$fechaCreacion=$_POST["fechaCreacion"];
$nombreCliente=$_POST["nombreCliente"];
$mesa=$_POST["mesa"];
$usuario=$_POST["usuario"];
$total=$_POST["total"];

//$sth= $this->db->prepare("UPDATE t_puesto SET Descripcion ="".$_POST["Descripcion"]."",Estado=".$_POST["Estado"]." where idOrden =".$_POST["idOrden"]); $sth->execute(); $data[]=array("id_Puesto"=>$id_Puesto,"Descripcion"=>$Descripcion,"Estado"=>$Estado); echo json_encode($data);
 }
public function Listar() {
$sth = $this->db->prepare("SELECT idOrden,fechaCreacion,nombreCliente,mesa,usuario,total, FROM orden"); 
$sth->execute(); while ($row = $sth->fetch()) {
$data[]=$sth->fetchAll();
 }
echo json_encode($data); }
public function Consultar() {
$id= $_POST{"id"}; $sth = $this->db->prepare("SELECT idOrden,fechaCreacion,nombreCliente,mesa,usuario,total, FROM orden Where idOrden =". $id); $sth->execute(); while ($row = $sth->fetch()) { $data[]=array("idOrden"=>$row["idOrden"],"fechaCreacion"=>$row["fechaCreacion"],"nombreCliente"=>$row["nombreCliente"],"mesa"=>$row["mesa"],"usuario"=>$row["usuario"],"total"=>$row["total"], ); } echo json_encode($data); }
}