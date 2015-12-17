<?php
    session_start();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Pagina</title>
        <link href="../css/bootstrap.css" type="text/css" rel="stylesheet">
        <link href="../css/estilo.css" type="text/css" rel="stylesheet">
        <script src="../js/jquery-2.1.4.js" type="text/jscript"></script>
        <script src="../js/bootstrap.js" type="text/javascript"></script>
        <script src="../js/js.js" type="application/x-javascript"></script>
        
    </head>
    
    <body>
    <div class="container">
    <!-- Inicio-->
            <div class="container inicio">
                <div class="subheader">
                    <div id="phone" class="pull-left">
                         <img src="../images/email.png" alt="phone"/>
                            Los clientes son lo mas IMPORTANTE
                    </div>
                    <div id="email" class="pull-right p-container">
                        <?php
                            echo $_SESSION["user"];
                        ?>
                    </div>
                </div>
            </div>
    <!--Logotipo-->
    	<center><img src="../images/mipke.png" class="img-responsive img"></center>
    <!--Menu-->
        <hr>
        <div class="masthead">
            <nav>
                <ul class="nav nav-pills nav-justified">
                    <li><a href="indexa.php">Inicio</a></li>
                    <li><a href="catalogo.php">Catalogo</a></li>
                    <li><a href="proveedores.php">Proveedores</a></li>
                    <li><a href="usuarios.php">Usuarios</a></li>
                </ul>
            </nav>
        </div>
        <hr>
    <!--Cuerpo-->
    <div class="row">
    	<div class="col-lg-3">
          <div id="micarousel" class="carousel slide" data-ride="carousel" data-inverval="2000">
            <ol class="carousel-indicators">
                <li data-slide-to="0" data-target="#micarousel"></li>
                <li data-slide-to="1" data-target="#micarousel"></li>
                <li data-slide-to="2" data-target="#micarousel"></li>
                <li data-slide-to="3" data-target="#micarousel"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img class="center-block" src="../images/1.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="center-block" src="../images/2.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="center-block" src="../images/3.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="center-block" src="../images/3.jpg" alt="...">
                </div>
            </div>
              <a class="left carousel-control" href="#micarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#micarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>   
            </div>
        </div>
        <div class="col-lg-6">
        <!--Contenido central-->
                <?php  
             require_once "provedor.php";
			 $prov = new Proveedor("","","","");
			 $s_prove = $prov->Seleccionar($_GET['id']);
			 $a_prove = $prov->get_prov();
			 ?>
			<table class=" table-responsive table-bordered">
            <thead>
                <tr>
                    <th> Id</th>
                    <th>Nombre</th>
                    <th>Ubicacion</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr><!-- /THEAD -->
            </thead>
                
            <tbody>
            <?php foreach ($a_prove as $row): ?>
                <tr>
                    <td><?php echo $row['idproveedor']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['ubicacion']; ?></td>
                    <td><?php echo $row['telefono']; ?></td>
                    <td><?php echo $row['correo']; ?></td>
                    <td><a href="php/Fmodificarp.php?id=<?php echo $row['idproveedor'];?>">
					<img src='images/modify.png' alt='cont' class='img-responsive'></a></td>
                    
					<td><a href="php/eliminarp.php?id=<?php echo $row['idproveedor'];?>">
                    <img src='images/delete.png' alt='cont' class='img-responsive'></a></td>
                </tr><!-- /TROW -->
                 <?php endforeach ?> 
            </tbody>
                  
            </table>
            <a data-type="zoomin" id="con"><button>Agregar</button><a>
        <!------------>
        </div>
        <div class="col-lg-3">
                      <div id="micarousel" class="carousel slide" data-ride="carousel" data-inverval="2000">
            <ol class="carousel-indicators">
                <li data-slide-to="0" data-target="#micarousel"></li>
                <li data-slide-to="1" data-target="#micarousel"></li>
                <li data-slide-to="2" data-target="#micarousel"></li>
                <li data-slide-to="3" data-target="#micarousel"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img class="center-block" src="../images/5.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="center-block" src="../images/6.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="center-block" src="../images/7.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="center-block" src="../images/8.jpg" alt="...">
                </div>
            </div>
              <a class="left carousel-control" href="#micarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#micarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>   
            </div>
        </div>
    </div>
    </div>
 <div class="overlay-container2">
		<div class="window-container zoomin window-container-visible">
			<div class="panel-heading">Modificar</div>
            <div class="panel-body ama">
            <form action="php/ModificarP.php?id=<?php echo $s_prove['idproveedor'] ?>" method="POST">
                    Nombre: <input type="text" name="nom" id="nom" value="<?php echo $s_prove['nombre']?>"><br>
                    Ubicacion: <input type="text" name="ubi" id="pass" value="<?php echo $s_prove['ubicacion']?>"><br>
                    Telefono: <input type="text" name="tel" id="tel" value="<?php echo $s_prove['telefono']?>"><br>
                    Email: <input type="text" name="ema" id="ema" value="<?php echo $s_prove['correo']?>"><br>
            </div>
            <button id="yes1">Modificar</button>
            <button ><a href="../proveedores.php">Cerrar</a></button>
            </form>
	</div> </div>
    </body>
</html>