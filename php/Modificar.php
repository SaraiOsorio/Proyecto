<?php
session_start();
?>
<?php
    require_once "usuario.php";
    $ruta = "../usuarios/" . $_FILES['foto']['name'];
    @move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta);
	$destino = "usuarios/" . $_FILES['foto']['name'];
	$id=$_GET['id'];

	$user = new        Usuario($_POST["nomb"],$_POST["ape"],$_POST["email"],$_POST["tel"],$destino,$_POST["pass"],$_POST["genero"],$_POST["veri"],$_POST["cal"],$_POST["num"],$_POST["colonia"],$_POST["ciudad"],$_POST["estado"],$_POST["cp"]);
	$us = $user->Modificar($id);
	$_SESSION["user"]="<img src='".$destino."' alt='cont' id='contacto' class='img-circle'><b>"." ".$_POST["nomb"]." ".$_POST["ape"]."| </b><a href='index.php'>Cerrar Sesion</a>";
            if($us==true){
                header ('Location: ../usuarios.php');
            }
            else{
                echo "Error";
            }
			
?>