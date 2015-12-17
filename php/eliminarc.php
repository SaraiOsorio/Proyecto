<?php 
	require_once "producto.php";
	$id=$_GET['id'];
	$prove = new Producto("","","","","","","","");
	$us=$prove->Eliminar($id);
            if($us==true){
                header ('Location: ../catalogo.php');
            }
            else{
                echo "Error";
            }
?>
