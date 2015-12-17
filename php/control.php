<?php
session_start();
	require_once("carrito.php");
	$va = new Carrito();
	$val=$va->validar();
	if($val == false){
		echo "<script type='text/javascript'> alert('Necesitas Logearte ->');</script>";
		echo '<meta http-equiv="refresh" content="0.24;../productos.php">';
	}
	else {
		$su=$va->Guardar($_SESSION['control'],$_POST['can'],$_GET['prod'],$_SESSION['id']);
		if($su=true)
		{
            header('Location: ../productos.php');
        }
		else 
		echo "error";
	}
?>