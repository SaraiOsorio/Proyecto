<?php
session_start();
?>
<?php
    require_once "Session.php";
    $session = new Session($_POST["nom"],$_POST["pass"]);
    $user = $session->Iniciar();
	 foreach ($user as $row):
    $_SESSION["id"]=$row['idusuario'];
     if($row['clasificacion']=='administrador')
    {
       header('Location: ../indexa.php');
    }
    else if($row['clasificacion']=='cliente')
    {
       header('Location: ../indexu.php');
    }
	$session->validar($row['imagen'],$row['nombre']);
   endforeach 
  
?>