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
        <div class="col-lg-9">
        <!--Contenido central-->
		<?php  
             require_once "php/producto.php";
			 $pro = new Producto("","","","","","","","");
			 $a_pro = $pro->get_produc();
        ?>
			<table class=" table-responsive table-bordered">
            <thead>
                <tr>
                    <th> Id</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Imagen</th>
                    <th>Existencia</th>
                    <th>Precio Cliente</th>
                    <th>Precio Proveedor</th>
                    <th>Proveedor</th>
                    <th></th>
                    <th></th>
                </tr><!-- /THEAD -->
            </thead>
               
            <tbody>
             <?php foreach ($a_pro as $row): ?>
                <tr>
                    <td><?php echo $row['idproducto']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['marca']; ?></td>
                    <td><img src='<?php echo $row['imagen']; ?>' alt='cont' class='ima'><b></td>
                    <td><?php echo $row['existencia']; ?></td>
                    <td><?php echo $row['pre_clien']; ?></td>
                    <td><?php echo $row['pre_prove']; ?></td>
                    <td><?php echo $row['proveedor']; ?></td>
                    <td><a href="php/Fmodificarc.php?id=<?php echo $row['idproducto'];?>"><img src='images/modify.png' alt='cont' class='img-responsive'></a></td>
					<td><a href="php/eliminarc.php?id=<?php echo $row['idproducto'];?>"><img src='images/delete.png' alt='cont' class='img-responsive'></a></td>
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
    	</div>   
        <div class="overlay-container">
		<div class="window-container zoomin">
            <span class="close">Cerrar</span>
			<div class="panel-heading">Agregar Producto</div>
            <div class="panel-body ama">
            <form action="php/guardar_producto.php" method="POST" enctype="multipart/form-data">
            Nombre: <input type="text" name="nom" id="nom"><br>
            Marca: <input type="text" name="mar" id="mar"><br>
            imagen: <input type="file" name="img" id="img">
            Existencia: <input type="text" name="exi" id="exi"><br>
            Precio Cliente: <input type="text" name="pc" id="pc"><br>
            Precio Proveedor: <input type="text" name="pp" id="pp"><br>
            Proveedor <select name="prove">
            	 <?php 
			 $s_pv = $pro->proveedores();
			 foreach ($s_pv as $row1): ?>
                	<option value="<?php echo $row1['idproveedor']; ?>"><?php echo $row1['nombre']; ?></option>
                 <?php endforeach ?> 
            </select>
            </div>
            <button name="enviar" id="yes">Guardar</button>
            </form>
		</div>
	</div>
    </body>
</html>