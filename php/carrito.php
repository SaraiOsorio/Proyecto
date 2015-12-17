<?php
    require_once "Conexion.php";
    class Carrito extends Conexion{
        public function __construct()
        {
            parent::__construct();
        }
        
		public function validar()
		{
			if ($_SESSION["user"]=='<img src="images/1439282789_unknown.png" alt="cont" id="contacto" class="img-circle">
                        <a data-type="zoomin" id="con">Inicio de Sesión</a> | <a data-type="zoomin1" id="reg">Registrarse</a>')
            {
							return false;
						}
			else {
				return true;
			}
		}
        public function Guardar($con,$cantidad,$producto,$usuario)
        {
			$result = $this->_db->query("INSERT INTO carrito (control,cantidad,id_usuario,id_producto) 
										VALUES (".$con.",".$cantidad.",".$usuario.",".$producto.")");
			return true;
        }
		public function cantidad($control)
		{
			$result = $this->_db->query('select sum(carrito.id_producto) as cantidad,sum(carrito.cantidad*productos.pre_clien) as total from carrito,productos where carrito.id_producto= productos.idproducto and carrito.control='.$control);
			$compra= $result->fetch_all(MYSQLI_ASSOC);
			return $result;
		}
        
		public function comprar($can,$total,$pag,$use,$fecha)
		{
			$result = $this->_db->query("insert into ventas(cantidad_pro,total,fecha,id_pago,id_usuario)values(".$can.",".$total.",'".$fecha."',".$pag.",".$use.")");
            $_SESSION['control']=0;
			return true;
		}
		     public function carrito($control=null,$use=null)
        {
        		$result = $this->_db->query('select productos.imagen, productos.nombre, carrito.cantidad,productos.pre_clien, productos.pre_clien * carrito.cantidad as total from productos,carrito where productos.idproducto= carrito.id_producto and carrito.control='.$control.' and carrito.id_usuario='.$use);
        		$users = $result->fetch_all(MYSQLI_ASSOC);
        		return $users;
        }

        public function control()
        {
        		$result = $this->_db->query('SELECT control FROM carrito');
        		$users = $result->fetch_all(MYSQLI_ASSOC);
        		return $users; 
        }
	}
	$control = new Carrito();
	$lider = $control->control();
	foreach($lider as $CTRL):
		$controlador=$CTRL['control'];
	endforeach;	
    $_SESSION['control']=$controlador;
?>