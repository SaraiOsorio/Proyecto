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
    	<center><img src="images/mipke.png" class="img-responsive img"></center>
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
        <div class="col-lg-6">
        <!--Contenido central-->
			<?php 
                require_once "php/Conexion.php";
            class comentarios extends Conexion {
                public function get_users()
    		      {
                    $result = $this->_db->query('select usuarios.imagen, usuarios.nombre,usuarios.apellidos, comentarios.comentario from usuarios,comentarios where usuarios.idusuario= comentarios.id_usuario');
                    $comen = $result->fetch_all(MYSQLI_ASSOC);
                    return $comen;
    		      } 
                }
 				$com = new comentarios();
				$come = $com->get_users();
            ?>
            <?php foreach ($come as $row): ?>
            <div class="panel">
            	<div class="panel-heading"><?php echo $row['nombre']?> <?php echo $row['apellidos']?></div>
                <div class="panel-body">
                	<div class="row">
                    	<div class="col-lg-3">
                        	<img src="<?php echo $row['imagen']?>" class="img-responsive">
                        </div>
                        <div class="col-lg-9">
                        	<?php echo $row['comentario'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
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
                    <img class="center-block" src="images/5.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="center-block" src="images/6.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="center-block" src="images/7.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="center-block" src="images/8.jpg" alt="...">
                </div>
            </div>
              <a class="left carousel-control" href="#micarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#micarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>   
            </div>
        </div>
    </div>
    </div>  
    </body>
</html>