<?php
class Login_Model extends Model {
	public function __construct() {
		parent::__construct ();
	}
	public function run() {
		 $correo   = $_POST["correo"];
		 $password = $_POST["password"];
		 
		 $query = "SELECT idUsuario,nombre,correo,password,rol From usuario where correo =:correo AND password= :password";
		 $sth = $this->db->prepare($query);
		 $sth->execute(
				array(
						':correo'=>$correo,
						':password'=>$password
				)
		 );
		     $data= $sth->fetch();
			 if($sth->rowCount()>0){
			 Session::init();
			 Session::set("nombre",$data["nombre"]);
			 Session::set("rol",$data["rol"]);
			 Session::set("loggedIn", true);
			 if($data["rol"]==1)
			 header('location: ../dashboard');
		     if($data["rol"]==2)
			 header('location: ../cajero');
		     if($data["rol"]==3)
			 header('location: ../cocinero');
		     if($data["rol"]==4)
			 header('location: ../salonero');
		 

			 }else{
			 header('location: ../login');
			 }
		 
			
	}
	
	
}


/*
 try {
		
			$query = "SELECT username,password From t_user where username =:username AND password= :password";
			$result = $this->db->prepare($query);
			$result->execute(
					array(
							':username'=>'jorge',
							':password'=>'d67326a22642a324aa1b0745f2f17abb'
					)
			);
		
			while ($row = $result->fetch()) {
				echo $row['username']."<br>";
				echo $row['password'];
			}
		
			//$db_connection = null;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
 * */