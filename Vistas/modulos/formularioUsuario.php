<?php 
	include("conexion_sql_server.php");
?>

<div class="col-md-8 col-md-offset-2">
	<h1>Empresa Follow Go</h1>
	<form method="Post" action="formularioUsuario.php">

		<div class="form-group">
			<label>Identificación</label>
			<input type="number" name="identificacion" class="form-control"
				placeholder="Escriba su documento de identificación"><br />
		</div>

		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Escriba su nombre"><br />
			</div>
			<div class="form-group col-md-4">
				<label>Apellido</label>
				<input type="text" name="apellido" class="form-control" placeholder="Escriba su apellido"><br />
			</div>
			<div class="form-group col-md-4">
				<label>Dirección</label>
				<input type="text" name="direccion" class="form-control" placeholder="Escriba su dirección"><br />
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				<label>Teléfono</label>
				<input type="number" name="telefono" class="form-control"
					placeholder="Ingrese su número telefonico"><br />
			</div>
			<div class="form-group col-md-6">
				<label for="inputEmail4">Correo</label>
				<input type="email" name="correo" class="form-control" id="inputEmail4"
					placeholder="Ingrese su correo"><br />
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				<label>Clave</label>
				<input type="password" name="clave" class="form-control" placeholder="Clave"><br />
			</div>
			<div class="form-group col-md-6">
				<label>Clave</label>
				<select name="codigoRol" class="form-control" placeholder="Rol">
					<option value="conductor"> Conductor </option>
					<option value="paciente"> Paciente </option>
					<option value="administrador"> Administrador </option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<input type="submit" name="insert" class="btn btn-outline-success" value="INSERTAR DATOS"><br />
		</div>
	</form>
	<br><br><br>



	<?php
		if(isset($_POST['insert'])){
            $identificacion = $_POST['identificacion'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];
            $codigoRol = $_POST['codigoRol'];

            switch ($codigoRol) {
                case 'conductor':
                $codigoRol = 1;
                    break;
                    case 'paciente':
                    $codigoRol = 2;
                        break;
                        case 'administrador':
                        $codigoRol = 3;
                            break;
            }
            $insertar = "INSERT INTO Usuario(identificacion,nombre,apellido,direccion,telefono,correo,clave,/*estadoUsuario*/codigoRol)

            VALUES
            
            ('$identificacion','$nombre','$apellido','$direccion','$telefono','$correo','$clave','$codigoRol')";


			$ejecutar = sqlsrv_query($con, $insertar); 

			if($ejecutar){
				echo "<h3>Insertado correctamente</h3>";
			}
        }
             ?>


	<div class="col-md-8 col-md-offset-2">
		<table class="table table-bordered table-responsive">
			<tr>
				<td>Identificación</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Dirección</td>
				<td>Teléfono</td>
				<td>Correo</td>
				<!--<td>Clave</td>
			<td>Estado</td>-->
				<td>Rol</td>
				<td>Acción</td>
				<td>Acción</td>
			</tr>

			<?php
			$consulta = "SELECT * FROM Usuario where estadoUsuario = 1";

			$ejecutar = sqlsrv_query($con, $consulta);

            $i = 0;

			while($fila = sqlsrv_fetch_array($ejecutar)){
                $identificacion = $fila['identificacion'];
                $nombre = $fila['nombre'];
                $apellido = $fila['apellido'];
                $direccion = $fila['direccion'];
                $telefono = $fila['telefono'];
                $correo = $fila['correo'];
                //$clave = $fila['clave'];
                //$estadoUsuario = $fila['estadoUsuario'];
                $codigoRol = $fila['codigoRol'];
            
			?>



			<tr align="center">
				<td><?php echo $identificacion; ?></td>
				<td><?php echo $nombre; ?></td>
				<td><?php echo $apellido; ?></td>
				<td><?php echo $direccion; ?></td>
				<td><?php echo $telefono; ?></td>
				<td><?php echo $correo; ?></td>
				<!--<td><?php// echo $clave; ?></td>
			<td><?php// echo $estadoUsuario; ?></td>-->
				<td><?php echo $codigoRol; ?></td>
				<td><a href="formularioUsuario.php?actualizar=<?php echo $id; ?>">Editar</a></td>
				<td><a href="formularioUsuario.php?borrar=<?php echo $id; ?>">Borrar</a></td>
			</tr>

			<?php } ?>

		</table>
	</div>


	<?php/*
if(isset(_GET['actualizar'])){
	include(actualizar.php);
}
*/
?>