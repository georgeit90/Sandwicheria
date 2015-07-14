<?php
class tipoplatillos_Model extends Model {
function __construct() {
parent::__construct(); }

public function Insertar() {
$idTipoPlatillo=$_POST["idTipoPlatillo"];
$descripcion=$_POST["descripcion"];
$sth=$this->db->prepare("INSERT INTO tipoplatillo(idTipoPlatillo,descripcion,)VALUES(:idTipoPlatillo,:descripcion,)");
$sth->execute(array(":Descripcion"=>$Descripcion,":Estado"=>$Estado)); 
$data[]=array("id_Puesto"=>$this->db->lastInsertId(),"Descripcion"=>$Descripcion,"Estado"=>$Estado);
echo json_encode($data); 
}
public function Modificar() {
$idTipoPlatillo=$_POST["idTipoPlatillo"];
$descripcion=$_POST["descripcion"];

//$sth= $this->db->prepare("UPDATE t_puesto SET Descripcion ="".$_POST["Descripcion"]."",Estado=".$_POST["Estado"]." where idTipoPlatillo =".$_POST["idTipoPlatillo"]); $sth->execute(); 
//$data[]=array("id_Puesto"=>$id_Puesto,"Descripcion"=>$Descripcion,"Estado"=>$Estado);
echo json_encode($data); 
}
public function Listar() {
$sth = $this->db->prepare("SELECT idTipoPlatillo,descripcion FROM tipoplatillo");
$sth->execute();
$data=$sth->fetchAll();
echo json_encode($data);
}

public function Consultar() {
$id= $_POST{"id"}; $sth = $this->db->prepare("SELECT idTipoPlatillo,descripcion, FROM tipoplatillo Where idTipoPlatillo =". $id); $sth->execute(); while ($row = $sth->fetch()) { $data[]=array("idTipoPlatillo"=>$row["idTipoPlatillo"],"descripcion"=>$row["descripcion"], ); } echo json_encode($data); }
}