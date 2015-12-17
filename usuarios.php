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
        <div class="row">
        <!--Contenido central-->
        <?php  
             require_once "php/usuario.php";
            $user= new Usuario("","","","","","","","","","","","","","");
            $a_users = $user->get_users();
        ?>
			<table class=" table-responsive table-bordered">
            <thead>
                <tr>
                    <th> Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tipo</th>
                    <th >Email</th>
                    <th>Telefono</th>
                    <th>Imagen</th>
                    <th>Password</th>
                    <th>Genero</th>
                    <th>Calle</th>
                    <th>No.Ext</th>
                    <th>Colonia</th>
                    <th>Ciudad</th>
                    <th>Estado</th>
                    <th>CP</th>
                    <th></th>
                    <th></th>
                </tr><!-- /THEAD -->
            </thead>
               
            <tbody>
             <?php foreach ($a_users as $row): ?>
                <tr>
                    <td><?php echo $row['idusuario']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['apellidos']; ?></td>
                    <td><?php echo $row['clasificacion']; ?></td>
                    <td id="e"><?php echo $row['email']; ?></td>
                    <td><?php echo $row['telefono']; ?></td>
                    <td><img src='<?php echo $row['imagen']; ?>' alt='cont' class='img-responsive user'><b></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['genero']; ?></td>
                    <td><?php echo $row['calle']; ?></td>
                    <td><?php echo $row['no_ext']; ?></td>
                    <td><?php echo $row['colonia']; ?></td>
                    <td><?php echo $row['cuidad']; ?></td>
                    <td><?php echo $row['estado']; ?></td>
                    <td><?php echo $row['cp']; ?></td>
                    <td><a href="php/Fmodificaru.php?id=<?php echo $row['idusuario'];?>"><img src='images/modify.png' alt='cont' class='img-responsive'></a></td>
					<td><a href="php/eliminar.php?id=<?php echo $row['idusuario'];?>"><img src='images/delete.png' alt='cont' class='img-responsive'></a></td>
                </tr><!-- /TROW -->
                <?php endforeach ?>  
            </tbody>
                  
            </table>
        <!------------>
        </div>
    </div>
        <div class="overlay-container">
		<div class="window-container zoomin">
            <span class="close">Cerrar</span>
			<div class="panel-heading">Modificar</div>
             <div class="panel-body ama">
			 <?php 
				$s_users = $user->Seleccionar($iden);?> 
            <form method="POST" enctype="multipart/form-data" action="php/Modificar.php?id=<?php echo $iden?>"><?php echo $iden?>
            <div class="row">
                <div class="col-lg-6">
                    <input type="text" name="nomb" placeholder="Nombre:" value="<?php echo $s_users['nombre']?>"><br>
                    <input type="text" name="ape" placeholder="Apellidos" value="<?php echo $s_users['apellidos']?>"><br>
                    <div class="gen">Genero: 
                        <label class="genero"><input type="radio" name="genero" value="1">Mujer 
                        </label><label class="genero"><input type="radio" name="genero" value="2" >Hombre </label>
                    </div>
                    <select name="veri">
                    	<option value="1">Administrador</option>
                        <option value="2">Cliente</option>
                    </select><br>
                    <input type="email" name="email"  placeholder="Email" value="<?php echo $s_users['email']?>"><br>
                    <input type="password" name="pass" placeholder="Passwosrd" value="<?php echo $s_users['password']?>"><br>
                    <input type="tel" name="tel" placeholder="Telefono" value="<?php echo $s_users['telefono']?>"><br>
                </div>
                <div class="col-lg-6">
                    <input type="file" name="foto" id="foto" placeholder="Foto">
                    <input type="text" name="cal" placeholder="Calle" value="<?php echo $s_users['calle']?>"><br>
                    <input type="text" name="num" placeholder="No.Ext" value="<?php echo $s_users['no_ext']?>"><input type="text" name="cp" placeholder="Codigo Postal" value="<?php echo $s_users['cp']?>"><br>
                    <input type="text" name="colonia" placeholder="Colonia" value="<?php echo $s_users['colonia']?>"><br>
                    <input type="text" name="ciudad" placeholder="Ciudad" value="<?php echo $s_users['cuidad']?>"><br>
                    <input type="text" name="estado" placeholder="Estado" value="<?php echo $s_users['estado']?>">
                </div>
            </div>
            	<button id="yes1">Guardar</button>
            </div>
            </form>
		</div>
	</div>    
    </body>
</html>