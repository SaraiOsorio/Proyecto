<?php 
	require_once "provedor.php";
	$id=$_GET['id'];
	$prove = new Proveedor("","","","");
	$pr=$prove->Eliminar($id);
            if($pr==true){
                header ('Location: ../proveedores.php');
            }
            else{
                echo "Error";
            }
?>
