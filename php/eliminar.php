<?php 
	require_once "usuario.php";
	$id=$_GET['id'];
	$user = new Usuario("","","","","","","","","","","","","","");
	$us=$user->Eliminar($id);
            if($us==true){
                header ('Location: ../usuarios.php');
            }
            else{
                echo "Error";
            }
?>
