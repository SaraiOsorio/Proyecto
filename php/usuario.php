<?php
    require_once "Conexion.php";
    class Usuario extends Conexion{
            private $nombre;
            private $apellidos;
            private $clasificacion;
            private $email;
            private $telefono;
            private $imagen;
            private $password;
            private $genero;
			private $calle;
			private $num;
			private $colonia;
			private $cuidad;
			private $estado;
			private $cp;
			
            
        public function __construct($nombre,$apellidos,$email,$telefono,$imagen,$password,$genero,$clasificacion,$calle,$num,$colonia,$ciudad,$estado,$cp)
        {
            parent::__construct();
            $this->nombre=$nombre;
            $this->apellidos=$apellidos;
			$this->email=$email;
			$this->telefono=$telefono;
			$this->imagen=$imagen;
			$this->password=$password;
			$this->genero=$genero;
			$this->clasificacion=$clasificacion;
			$this->calle=$calle;
			$this->num=$num;
			$this->colonia=$colonia;
			$this->cuidad=$ciudad;
			$this->estado=$estado;
			$this->cp=$cp;
			
        }
        public function get_users()
    		{
        		$result = $this->_db->query('SELECT usuarios.*,clasificaciones.clasificacion,generos.genero FROM usuarios,generos,clasificaciones where generos.idgenero=usuarios.id_genero and clasificaciones.idclasificacion=usuarios.id_clasificacion');
        		$users = $result->fetch_all(MYSQLI_ASSOC);
        		return $users;
    		}
        public function Guardar()
        {
			$result = $this->_db->query("INSERT INTO boutique.usuarios (nombre, apellidos, id_clasificacion, email, telefono, imagen, password, id_genero,calle,no_ext,colonia,cuidad,estado,cp) VALUES ('".$this->nombre."', '".$this->apellidos."',".$this->clasificacion.", '".$this->email."', '".$this->telefono."', '".$this->imagen."', '".$this->password."', ".$this->genero.",'".$this->calle."','".$this->num."','".$this->colonia."','".$this->cuidad."','".$this->estado."',".$this->cp.")");
			return true;
        }
		public function Eliminar($id)
		{
			$result = $this->_db->query("DELETE FROM usuarios WHERE idusuario='$id'");
        	return true;
		}
		public function Seleccionar($id)
		{
			$resultado=$this->_db->query("SELECT idusuario,nombre, apellidos, id_clasificacion, email, telefono, imagen, password, id_genero,calle,no_ext,colonia,cuidad,estado,cp FROM usuarios WHERE idusuario=".$id);	
			$usuario=$resultado->fetch_assoc();	
			return $usuario;
		}
		public function Modificar($id){
			$result = $this->_db->query("UPDATE usuarios SET nombre='".$this->nombre."', apellidos='".$this->apellidos."',id_clasificacion=".$this->clasificacion.",email='".$this->email."',telefono='".$this->telefono."',imagen='".$this->imagen."',password='".$this->password."',id_genero=".$this->genero.",calle='".$this->calle."',no_ext='".$this->num."',colonia='".$this->colonia."',cuidad='".$this->cuidad."',estado='".$this->estado."',cp=".$this->cp." where idusuario=".$id);
			return true;
		}
		
    }
?>
	