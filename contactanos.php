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
                            Envio gratis desde $1000.00
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
    	<div class="col-lg-2">
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
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-8">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3600.710862321726!2d-103.38209180313987!3d25.51468777694099!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2smx!4v1435419706801" width="600" height="450" frameborder="0" style="border:0" allowfullscreen seamless></iframe>
                </div>
                <div class="col-lg-4 color">
                    <form class="form" action="php/comentarios.php" method="POST">
                        <input type="text" placeholder="Nombre" name="nombre">
                        <input type="email" placeholder="Correo Electronico" name="email">
                        <textarea placeholder="Dejanos tu Comentario nos interesa" name="texto"></textarea>
                        <button >Enviar</button>
                    </form>
                </div>
            </div> 
        </div>
    </div>
    </div>
    <div class="overlay-container">
		<div class="window-container zoomin">
            <span class="close">Cerrar</span>
			<div class="panel-heading">Inicio de Sesión</div>
            <div class="panel-body ama">
            <form action="php/comentarios.php" method="post">
            Nombre: <input type="text" name="nom" id="nom"><br>
            Password: <input type="password" name="pass" id="pass"><br>
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
	</div>    
    </body>
</html>