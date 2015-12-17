<?php
session_start();
?>
<?php
    require_once "provedor.php";
	$id=$_GET['id'];
	$prove = new Proveedor($_POST["nom"],$_POST["ubi"],$_POST["tel"],$_POST["ema"]);
	$pr = $prove->Modificar($id);
            if($pr==true){
                header ('Location: ../proveedores.php');
            }
            else{
                echo "Error";
            }
?>