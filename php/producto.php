<?php
    require_once "Conexion.php";
    class Producto extends Conexion{
            private $nombre;
            private $marca;
            private $imagen;
            private $existencia;
            private $preci;
            private $prepr;
            private $proveedor;
			
            
        public function __construct($nombre,$marca,$imagen,$existencia,$precli,$prepro,$proveedor)
        {
            parent::__construct();
            $this->nombre=$nombre;
            $this->marca=$marca;
			$this->imagen=$imagen;
			$this->existencia=$existencia;
			$this->preci=$precli;
			$this->prepr=$prepro;
			$this->proveedor=$proveedor;
			
        }
		public function proveedores()
		{
			$result = $this->_db->query('SELECT idproveedor,nombre FROM proveedores');
        		$users = $result->fetch_all(MYSQLI_ASSOC);
        		return $users;
		}
        public function get_produc()
    		{
        		$result = $this->_db->query('SELECT productos.*,proveedores.nombre as proveedor FROM productos,proveedores WHERE productos.id_proveedor=proveedores.idproveedor');
        		$users = $result->fetch_all(MYSQLI_ASSOC);
        		return $users;
    		}
		        public function set_producto($dat)
    		{
        		$result = $this->_db->query('SELECT productos.*,proveedores.nombre as proveedor FROM productos,proveedores WHERE productos.id_proveedor=proveedores.idproveedor and productos.nombre like "%'.$dat.'%"');
        		$users = $result->fetch_all(MYSQLI_ASSOC);
        		return $users;
    		}
        public function Guardar()
        {
			$result = $this->_db->query("INSERT INTO productos (nombre,marca,imagen,existencia,pre_clien,pre_prove,id_proveedor) VALUES ('".$this->nombre."', '".$this->marca."','".$this->imagen."',".$this->existencia.", ".$this->preci.", ".$this->prepr.", ".$this->proveedor.")");
			return true;
        }
		public function Eliminar($id)
		{
			$result = $this->_db->query("DELETE FROM productos WHERE idproducto='$id'");
        	return true;
		}
		public function Seleccionar($id)
		{
			$resultado=$this->_db->query("SELECT idproducto, nombre, marca, existencia, pre_clien, pre_prove,
			id_proveedor FROM productos WHERE idproducto=".$id);	
			$producto=$resultado->fetch_assoc();	
			return $producto;
		}
		public function Modificar($id){
			$result = $this->_db->query("UPDATE productos SET nombre='".$this->nombre."', marca='".$this->marca."',existencia=".$this->existencia.",pre_clien=".$this->preci.",pre_prove=".$this->prepr.",id_proveedor=".$this->proveedor.",imagen='".$this->imagen."' WHERE idproducto=".$id);
			return true;
		}
		
    }
?>
	