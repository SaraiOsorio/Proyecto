<?php
    require_once "Conexion.php";
    class Proveedor extends Conexion{
            private $nombre;
            private $ubicacion;
            private $telefono;
            private $correo;
    
        public function __construct($nombr,$ubicacio,$telefon,$corre)
        {
            parent::__construct();
            $this->nombre=$nombr;
            $this->ubicacion=$ubicacio;
            $this->telefono=$telefon;
            $this->correo=$corre;
			
        }
        public function get_prov()
    		{
        		$result = $this->_db->query('SELECT * FROM proveedores');
        		$prove = $result->fetch_all(MYSQLI_ASSOC);
        		return $prove;
    		}
        public function Guardar()
        {
			$result = $this->_db->query(
			"INSERT INTO boutique.proveedores (nombre,ubicacion,telefono,correo) 
			VALUES ('".$this->nombre."','".$this->ubicacion."','".$this->telefono."', '".$this->correo."')");
			return true;
        }
		public function Eliminar($id)
		{
			$result = $this->_db->query("DELETE FROM proveedores WHERE idproveedor=".$id);
        	return true;
		}
		public function Seleccionar($id)
		{
			$resultado=$this->_db->query("SELECT idproveedor,nombre, ubicacion, telefono,correo FROM proveedores WHERE idproveedor=".$id);	
			$proveedor=$resultado->fetch_assoc();	
			return $proveedor;
		}
		public function Modificar($id){
			$result = $this->_db->query("UPDATE proveedores SET nombre='".$this->nombre."', ubicacion='".$this->ubicacion."',telefono='".$this->telefono."',correo='".$this->correo."' where idproveedor=".$id);
			return true;
		}
    }
?>