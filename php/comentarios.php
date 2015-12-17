<?php
session_start();
?>
<?php
require_once "Conexion.php";
class comentarios extends Conexion{
	private $nombre;
	private $email;
	private $text;
		public function __construct($nombre,$email,$texto)
		{
			parent::__construct();
			$this->nombre=$nombre;
			$this->email=$email;
			$this->text=$texto;
					
		}
		public function Id()
		{	
			$result = $this->_db->query('SELECT idusuario FROM usuarios WHERE nombre="'.$this->nombre.'" and email="'.$this->email.'"');
			$usuario=$result->fetch_assoc();	
			return $usuario;
		}
        public function Gardar($id)
    	{
            $result = $this->_db->query('INSERT INTO comentarios(id_usuario,comentario) VALUES('.$id.',"'.$this->text.'")');
		} 
    } 
 	$com = new comentarios($_POST['nombre'],$_POST['email'],$_POST['texto']);
	$Iden = $com->Id();
	$com->Gardar($Iden['idusuario']);
	header('Location: ../contactanos.php');
?>