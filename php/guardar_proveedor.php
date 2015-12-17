<?php
session_start();
?>
<?php
    require_once "provedor.php";
	$prov = new Proveedor($_POST["nom"],$_POST["ubi"],$_POST["tel"],$_POST["ema"]);
	$pr = $prov->Guardar();
            if($pr==true){
                header ('Location: ../proveedores.php');
            }
            else{
                echo "Error";
            }
?>