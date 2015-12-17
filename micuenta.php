<?php
    session_start();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Pagina</title>
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
        <link href="css/estilo.css" type="text/css" rel="stylesheet">
        <script src="js/jquery-2.1.4.js" type="text/jscript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/js.js" type="application/x-javascript"></script>
    </head>
    
    <body>
    <div class="container">
    <!-- Inicio-->
            <div class="container inicio">
                <div class="subheader">
                    <div id="phone" class="pull-left">
                         <img src="images/email.png" alt="phone"/>
                            Siempre a tu servicio
                    </div>
                    <div id="email" class="pull-right">
                        <?php
                            echo $_SESSION["user"];
                        ?>
                    </div>
                </div>
            </div>
    <!--Logotipo-->
    	<center><img src="images/mipke.png" class="img-responsive img"></center>
    <!--Menu-->
        <hr>
        <div class="masthead">
            <nav>
                <ul class="nav nav-pills nav-justified">
                    <li><a href="indexu.php">Inicio</a></li>
                    <li><a href="productos.php">Productos</a></li>
                    <li><a href="nosotros.php">Nosotros</a></li>
                    <li><a href="contactanos.php">Contactanos</a></li>
                    <li><a href="micuenta.php">Mi Cuenta</a></li>
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
                    <img class="center-block" src="images/1.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="center-block" src="images/2.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="center-block" src="images/3.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="center-block" src="images/3.jpg" alt="...">
                </div>
            </div>
              <a class="left carousel-control" href="#micarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#micarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>   
            </div>
        </div>
        <div class="col-lg-9">
        <?php 
            if($_SESSION["id"]!=0){
			require 'php/carrito.php';
			 $pro =  new Carrito();
			 $a_pro = $pro->carrito($_SESSION['control'],$_SESSION['id']);
    $s_pro = $pro->cantidad($_SESSION['control']);}
		?>
        <!--Contenido central-->
         <?php 
			if ($_SESSION["user"]=='<img src="images/1439282789_unknown.png" alt="cont" id="contacto" class="img-circle">
                        <a data-type="zoomin" id="con">Inicio de Sesión</a> | <a data-type="zoomin1" id="reg">Registrarse</a>')
            {
							echo "<h1>Neceitas estas logeado para ver tu cuenta</h1>";
			}
            else {
                foreach ($a_pro as $row): ?>
				<center><h1>Articulos a Comprar</h1></center>
         	<div class="productos"><center>
					<article class="producto">
						<div class="panel panel-warning">
							<div class="panel-heading">
                            	<h1 class="panel-title"><?php echo $row['nombre']; ?></h1>
							</div>
                            <div id="mov" class="panel-body com" style="height:205px;">
                                <img src='<?php echo $row['imagen']; ?>' alt='cont' class='img-responsive'>
                                Precio Unitario: $<?php echo $row['pre_clien']; ?><br>
                                Cantidad: <?php echo $row['cantidad'];?>
                            </div>
                            <div class="panel-footer ">
                                <h1 class="panel-title">TOTAL: $<?php echo $row['total']; ?></h1>	
                            </div>
						</div>
					</article>
                 <br>
                <form method="post" action="">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nuevo">Comprar Todo</button>
                    <?php endforeach; } ?>
        

            <div class="modal fade" role="dialog" id="nuevo">
                <div class="modal-dialog modal-lg">
                       <div class="modal-content">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                     <button data-dismiss="modal" class="close" type="button"><span>&times;</span></button>
                                     <h2>Ticket de Compra</h2>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nombre"><h4>Productos</h4></label>
                                    <div class="row">
                                        <div class="col-lg-4"><b>Producto</b></div>
                                        <div class="col-lg-4"><b>Cantidad</b></div>
                                        <div class="col-lg-4"><b>Total</b></div>
                                        
                                    </div>
                                    <?php foreach($a_pro as $row): ?>
                                    <div class="row">
                                        <div class="col-lg-4"><?php echo $row['nombre']?></div>
                                        <div class="col-lg-4"><?php echo $row['cantidad'] ?></div>
                                        <div class="col-lg-4">$<?php echo $row['total']?></div>
                                        
                                    </div>
                                    <?php endforeach ?>
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4">_____________</div>
                                        <div class="col-lg-4">_____________</div>
                                    </div>
                                    <div class="row">
                                    <?php foreach($s_pro as $row1): ?>
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4"><b><?php echo $row1['cantidad'];?></b></div>
                                        <div class="col-lg-4"><b>$<?php echo $row1['total']?></b></div>
                                    
                                    </div>
                                </div>	
                                <div class="form-group">
                                	<label for="fecha">Fecha</label>
                                    <input type="date" name="fecha">
                                </div>
                                <div class="form-group">
                                    <label for="pago">Tipo de Pago</label>
                                    <select name="pago">
                                        <option value="1">Banco</option>
                                        <option value="2">PayBack</option>
                                    </select>
                                </div>
                           </div>
                                   <?php 
                                        if(isset($_REQUEST['comprar'])){
                                            
                                            $pro->comprar($row1['cantidad'],$row1['total'],$_POST['fecha'],$_POST['pago'],$_SESSION['id']);
                    
                                        }
                                    ?><?php endforeach ?>
                           <div class="modal-footer">
                                <div class="form-group">
                                    <button type="submit" name="comprar" class="btn btn-success">Comprar</button>
                                </div>
                           </div>
                        </div>
                    </form>
                </center>
            </div>
        <!------------>
        </div>
    </div>
    </div>
       <div class="overlay-container">
		<div class="window-container zoomin">
            <span class="close">Cerrar</span>
			<div class="panel-heading">Inicio de Sesión</div>
            <div class="panel-body ama">
            <form action="" method="post">
            Nombre: <input type="text" name="nom"><br>
            Password: <input type="password" name="pass"><br>
            </div>
            <button name="enviar" id="yes">Iniciar</button>
            </form>
		</div>
	</div>
  <div class="overlay-container1">
		<div class="window-container1 zoomin1">
            <span class="close">Cerrar</span>
			<div class="panel-heading">Registrarse</div>
            <div class="panel-body ama">
            <form action="php/guardar_usuario.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6">
                    <input type="text" name="nomb" placeholder="Nombre:"><br>
                    <input type="text" name="ape" placeholder="Apellidos"><br>
                    <div class="gen">Genero: 
                        <label class="genero"><input type="radio" name="genero" value="1">Mujer </label><label class="genero"><input type="radio" name="genero" value="2" >Hombre </label>
                    </div>
                    <input type="text" name="veri" placeholder="Introduce: 123"><br>
                    <input type="email" name="email"  placeholder="Email"><br>
                    <input type="password" name="pass" placeholder="Passwosrd"><br>
                    <input type="tel" name="tel" placeholder="Telefono"><br>
                </div>
                <div class="col-lg-6">
                    <input type="file" name="foto" id="foto" placeholder="Foto">
                    <input type="text" name="cal" placeholder="Calle"><br>
                    <input type="text" name="num" placeholder="No.Ext"><input type="text" name="cp" placeholder="Codigo Postal"><br>
                    <input type="text" name="colonia" placeholder="Colonia"><br>
                    <input type="text" name="ciudad" placeholder="Ciudad"><br>
                    <input type="text" name="estado" placeholder="Estado">
                </div>
            </div>
            </div>
            <button id="yes1">Registrarse</button>
            </form>
		</div>
	</div>    
    </body>
</html>