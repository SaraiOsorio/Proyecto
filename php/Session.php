<?php
    require_once "Conexion.php";
    class Session extends Conexion{
            private $usuario;
            private $contrasenia;
			private $iden=1;

        public function __construct($user, $pass)
        {					
            parent::__construct();
            $this->usuario=$user;
            $this->contrasenia=$pass;
        }
        public function Iniciar()
        {
            $result = $this->_db->query("select usuarios.idusuario,usuarios.nombre,usuarios.apellidos,usuarios.imagen,clasificaciones.clasificacion from usuarios,clasificaciones where usuarios.nombre='".$this->usuario."' and usuarios.password='".$this->contrasenia."' and usuarios.id_clasificacion=clasificaciones.idclasificacion");
        $users = $result->fetch_all(MYSQLI_ASSOC);
		$this->iden=2;
        return $users;
        }
		
		public function validar($img,$nom){
			if($this->iden=='1')
			{
				$_SESSION["user"]='<img src="images/1439282789_unknown.png" alt="cont" id="contacto" class="img-circle">
                        <a data-type="zoomin" id="con">Inicio de Sesión</a> | <a data-type="zoomin1" id="reg">Registrarse</a>';
			}
			else if ($this->iden=='2'){
				    $_SESSION["user"]="<img src='".$img."' alt='cont' id='contacto' class='img-circle'><b>"." ".$nom."| </b><a href='index.php'>Cerrar Sesion</a>";
			}
		}
    }
?>