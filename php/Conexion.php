<?php 
class Conexion
{
    protected $_db;
    public function __construct()
    {
        $this->_db = new mysqli('localhost', 'root','', 'boutique');
        if ( $this->_db->connect_errno )
        {
            echo "Fallo al conectar a MySQL: ". $this->_db->connect_error;
            return;    
        }
        $this->_db->set_charset('utf-8');
    }
}
?>