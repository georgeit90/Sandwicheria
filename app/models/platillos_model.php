<?php
require_once("helpers/functions.php");
class Platillos_Model extends Model {

function __construct() {
parent::__construct(); 
}


public function Insertar() 
{
//$idPlatillo=$_POST["idPlatillo"];
$descripcion=$_POST["descripcion"];
$total=$_POST["total"];
$nombre=$_POST["nombre"];
$tipoPlatillo=$_POST["tipoPlatillo"];
$platillos=$_POST["platillos"];
$sudTotales=$_POST["sudTotal"];
$cantidades=$_POST["cantidad"];
$sth=$this->db->prepare("INSERT INTO platillo(descripcion,total,nombre,tipoPlatillo)VALUES(:descripcion,:total,:nombre,:tipoPlatillo)"); 
$sth->execute(array(":descripcion"=>$descripcion,":nombre"=>$nombre,":total"=>$total,":tipoPlatillo"=>$tipoPlatillo)); 
$idPlatillo=$this->db->lastInsertId();
$tipo="";
$sudTotal=0;
$cantidad=0;
$ind=0;

foreach($platillos as $platillo=>$idIngredientes){
	$tipo=$platillo;
	$sudTotal=$sudTotales[$tipo];
	$cantidad=$cantidades[$tipo];		  
		foreach( $idIngredientes as $idIngrediente){   
		$sths=$this->db->prepare("INSERT INTO ".$tipo."platillo(platillo,".$tipo.",subtotal,cantidad)VALUES(:platillo,:".$tipo.",:subtotal,:cantidad)");		
		$data[]=$sths->execute(array(":platillo"=>$idPlatillo,":".$tipo=>$idIngrediente,":subtotal"=>$sudTotal[$ind],":cantidad"=>$cantidad[$ind])); 
	
		$ind++;
		   
		}
    $ind=0;
}

}


public function Modificar() {

$idPlatillo=$_POST["idPlatillo"];
$descripcion=$_POST["descripcion"];
$total=$_POST["total"];
$nombre=$_POST["nombre"];
$tipoPlatillo=$_POST["tipoPlatillo"];
$platillos=$_POST["platillos"];
$sudTotales=$_POST["sudTotal"];
$cantidades=$_POST["cantidad"];

$sth = $this->db->prepare("UPDATE platillo SET descripcion = '".$descripcion."',total=".$total.",nombre ='".$nombre."', tipoPlatillo=".$tipoPlatillo." where idPlatillo =".$idPlatillo); 
$sth->execute(); 

$tipo="";
$sudTotal=0;
$cantidad=0;

$listIngred = array("carne","condimento","fruta","pan","pasta","queso","vegetal");

foreach($listIngred as $ingrediente){
$sths=	$this->db->prepare("DELETE FROM ".$ingrediente."platillo WHERE platillo=".$idPlatillo); 
$sths->execute(); 

}

$ind=0;
foreach($platillos as $platillo=>$idIngredientes){
	$tipo=$platillo;
	$sudTotal=$sudTotales[$tipo];
	$cantidad=$cantidades[$tipo];	
    	
		foreach( $idIngredientes as $idIngrediente){   
		$sths=$this->db->prepare("INSERT INTO ".$tipo."platillo(platillo,".$tipo.",subtotal,cantidad)VALUES(:platillo,:".$tipo.",:subtotal,:cantidad)");		
		$sths->execute(array(":platillo"=>$idPlatillo,":".$tipo=>$idIngrediente,":subtotal"=>$sudTotal[$ind],":cantidad"=>$cantidad[$ind])); 
	    $data[]=array(":platillo"=>$idPlatillo,":".$tipo=>$idIngrediente,":subtotal"=>$sudTotal[$ind],":cantidad"=>$cantidad[$ind]);
		$ind++;
		
		}
    $ind=0;
}


}
public function Listar() {
$sth = $this->db->prepare("SELECT p.idPlatillo,p.descripcion,p.total,p.nombre,p.tipoPlatillo,t.descripcion as tipo FROM platillo p,tipoplatillo t where p.tipoPlatillo = t.idTipoPlatillo ");
$sth->execute();
$data= $sth->fetchAll();
echo json_encode($data); 
}
public function Consultar() {
$id=$_GET["id"];
//SELECT * FROM `carneplatillo` WHERE platillo=1
$sth = $this->db->prepare("SELECT idPlatillo,descripcion,total,nombre,tipoPlatillo FROM platillo Where idPlatillo =". $id);
$sth->execute();
//$data=$sth->fetchAll(); 
 $listIngred = array("carne","condimento","fruta","pan","pasta","queso","vegetal");
$ind=0;
foreach($listIngred as $ingrediente){
$sths = $this->db->prepare("SELECT p.platillo,p.".$ingrediente.",i.descripcion,p.subtotal,p.cantidad FROM ".$ingrediente."platillo p,".$ingrediente." i WHERE p.platillo = ".$id." and p.".$ingrediente." = i.id".ucfirst($ingrediente));
$sths->execute();
//$ingredientes[]=$sths->fetchAll();
 while ($row = $sths->fetch()) { 
 $ingredientes[]=array("platillo"=>$row["platillo"],"tipo"=>$ingrediente,"nombre"=>$row["descripcion"],"id"=>$row[$ingrediente]
 ,$ingrediente=>$row[$ingrediente],"subtotal"=>$row["subtotal"],"cantidad"=>$row["cantidad"]);
 $ind++;
 }
//var_dump($sths);
}
//var_dump($ingredientes);
$lista=array();


 while ($row = $sth->fetch()) { 
$data[]=array("idPlatillo"=>$row["idPlatillo"],"descripcion"=>$row["descripcion"],
"total"=>$row["total"],"nombre"=>$row["nombre"],"tipoPlatillo"=>$row["tipoPlatillo"],"ingredientes"=>$ingredientes); 
}
//$data=array_push_assoc($data,"ingredientes",$ingredientes);

echo json_encode($data); 
}


}