<?php
session_start();
?>
<?php
    require_once "producto.php";
	$destino = "images/articulos/".$_FILES['img']['name'];
	$pro = new Producto($_POST["nom"],$_POST["mar"],$destino,$_POST["exi"],$_POST["pc"],$_POST["pp"],$_POST["prove"]);
	$us = $pro->Guardar();
            if($us==true){
                header ('Location: ../catalogo.php');
            }
            else{
                echo "Error";
            }
?>

          