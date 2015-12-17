<?php
session_start();
?>
<?php
    require_once "usuario.php";
    $ruta = "../usuarios/" . $_FILES['foto']['name'];
    @move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta);
	$destino = "usuarios/" . $_FILES['foto']['name'];

	if($_POST["veri"]=='123')
	{
		$clas="2";
	}
	else if($_POST["veri"]=='admin')
	{
		$clas="1";
	}
	$user = new        Usuario($_POST["nomb"],$_POST["ape"],$_POST["email"],$_POST["tel"],$destino,$_POST["pass"],$_POST["genero"],$clas,$_POST["cal"],$_POST["num"],$_POST["colonia"],$_POST["ciudad"],$_POST["estado"],$_POST["cp"]);
	$us = $user->Guardar();
            if($us==true){
                header ('Location: ../index.php');
            }
            else{
                echo "Error";
            }
?>

          