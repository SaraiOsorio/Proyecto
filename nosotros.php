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
                            Siempre a tu servicio.
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
        <div class="col-lg-6">
        <!--Contenido central-->
                    <textarea class="textarea">
                        HISTORIA
Nuestra incursión en la red fue en el año de 2015 trabajando al 100% en las necesidad del cliente, brindando nuestros servicios a todos. Con el paso del tiempo fuimos adquiriendo todos los conocimientos necesarios para la atencion de la variedad de clientes que la Boutique Mi Pekeñita a adquirido, por lo cual nos sentimos motivados para lanzarnos a la aventura de seguir crecienco cracias a ustedes, y llegar a rebazar fronteras y repartir nuestros productos a todo el mundo.
                            
Logrando obtener una gran aceptación durante todo este tiempo por nuestra amplia gama de colores, calidad y servicio.En los ultimos meses decidimos dar un paso más incursionando ahora tambien a la venta de productos de maquillaje, brindando nuestros primeros servicios a empresas dedicadas al maquillaje de modelos profesionales, los cuales han manifestado una gran satisfacción gracias a nuestro incomparable modelaje, servicio y el más estricto control de calidad.

                        MISIÓN
Ofrecer a las damas que gustan del buen vestir, ropa de la más alta calidad al mejor precio del mercado, siempre tratando de tener modelaje que este al corriente con lo último de la moda, para que así pueda desarrolar sus actividad cotidianas luciendo su belleza y resaltando su elegancia.

                        VISIÓN
Posicionarnos en el mercado como una empresa exitosa y socialmente responsable con gran reconocimiento a nivel nacional gracias a nuestros productos, calidad, precios y servicio, siempre respetando los derechos y el trabajo tanto de nuestros colaboradores como de nuestros clientes, para asi seguir creciendo y poder ofrecer nuestros productos en todo el interior del país.

                        OBJETIVO
Ser la organización más importante en todas las áreas que la conforman.
Obtener un número importante de clienes.
Posicionarnos  como una de las 10 empresas más importantes.
Cubrir al máximo la demanda de nuestros clientes para brindar una satisfacción total
Mantener siempre los precios más bajos a comparación de nuestra competencia directa.
Brindar elegancia, comodidad y estilo a toda nuestra clientela.  
                    </textarea>
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
        <div class="overlay-container">
		<div class="window-container zoomin">
            <span class="close">Cerrar</span>
			<div class="panel-heading">Inicio de Sesión</div>
            <div class="panel-body ama">
            <form action="php/aplicacion.php" method="post">
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
    </body>
</html>