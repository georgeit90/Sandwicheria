<?php

class Usuarios_Model extends Model {
	
	function __construct() {
		parent::__construct(); 
	}
		
		public function Insertar() { 
		$idUsuario= $_POST["idUsuario"];
		$nombre=$_POST["nombre"];
		$apellido1=$_POST["apellido1"];
		$apellido2=$_POST["apellido2"];
		$telefono=$_POST["telefono"];
		$correo=$_POST["correo"];
		$password=$_POST["password"];
		$rol=$_POST["rol"];

		$sth=$this->db->prepare("INSERT INTO usuario( idUsuario, nombre, apellido1, apellido2, telefono, correo, password, rol) VALUES(:idUsuario,:nombre,:apellido1,:apellido2,:telefono,:correo,:password,:rol)");
		$sth->execute( array(":idUsuario"=>$idUsuario,":nombre"=>$nombre,":apellido1"=>$apellido1,":apellido2"=>$apellido2,":telefono"=>$telefono,":correo"=>$correo,":password"=>$password,":rol"=>$rol)); 
		
		$data[]=array("idUsuario"=>$idUsuario,"nombre"=>$nombre,"apellido1"=>$apellido1,
				"apellido2"=>$apellido2,"telefono"=>$telefono,"correo"=>$correo,
				"password"=>$password,"rol"=>$rol);

		echo json_encode($data); 
		
		}
		
		public function Modificar() {
		$idUsuario=$_POST["idUsuario"];
		$nombre=$_POST["nombre"];
		$apellido1=$_POST["apellido1"];
		$apellido2=$_POST["apellido2"];
		$telefono=$_POST["telefono"];
		$correo=$_POST["correo"];
		$password=$_POST["password"];
		$rol=$_POST["rol"];
		$sth= $this->db->prepare("UPDATE usuario SET  idUsuario =".$idUsuario.",nombre ='".$nombre."',apellido1 ='".$apellido1."',apellido2 ='".$apellido2."',telefono ='".$telefono."',correo ='".$correo."',password ='".$password."',rol =".$rol." where idUsuario =".$idUsuario); 
		$sth->execute();
				$data[]=array("idUsuario"=>$idUsuario,"nombre"=>$nombre,"apellido1"=>$apellido1,
				"apellido2"=>$apellido2,"telefono"=>$telefono,"correo"=>$correo,
				"password"=>$password,"rol"=>$rol);
		echo json_encode($data); 
		}
	
		public function Listar() {
		$sth = $this->db->prepare("SELECT idUsuario,nombre,apellido1,apellido2,telefono,correo,password,rol FROM usuario"); 
		$sth->execute(); 
		$data=$sth->fetchAll();
		echo json_encode($data); 
		}
		
		public function Consultar() {
		$id= $_POST{"id"};
		$sth = $this->db->prepare("SELECT idUsuario,nombre,apellido1,apellido2,telefono,correo,password,rol, FROM usuario Where idUsuario =". $id);
		$sth->execute();
		 while ($row = $sth->fetch()) { 
		 $data[]=array("idUsuario"=>$row["idUsuario"],"nombre"=>$row["nombre"],"apellido1"=>$row["apellido1"],"apellido2"=>$row["apellido2"],"telefono"=>$row["telefono"],"correo"=>$row["correo"],"password"=>$row["password"],"rol"=>$row["rol"], ); }
		 echo json_encode($data); 
		}
		
		public function Borrar(){
			$id= $_POST{"id"};
			$sth = $this->db->prepare("DELETE FROM `usuario`  WHERE idUsuario =". $id);
			$sth->execute();
			echo json_encode($id);
		
		}
}