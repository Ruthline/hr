<?php 
//1.2. Incluimos nuestra conexión y modelo 
	include ("modelo/conexion.php");
	include ("modelo/musu.php");
	//1.3. Instanciamos el modelo a variable php
	$musu = new musu();

	//1.3.1. Creamos las Variables PHP para capturar los datos del Formulario
	// isset() es una función de PHP que devuelve true si la variable o elemento del arreglo existe y tiene un valor distinto de null.
	$correo = isset($_POST['correo']) ? $_POST['correo']:NULL;
	if (!$correo){
		$correo = isset($_GET['correo']) ? $_GET['correo']:NULL;}

	$nombre_usuario = isset($_POST['nombre_usuario']) ? $_POST['nombre_usuario']:NULL; //cada una de estas sentencias ayudan a saber si existe una entrada con la variable distinta de NULL, y usa el operador ternario para que si se cumple ejecute lo de la derecha sino salte después de los :
	$apellido_usuario = isset($_POST['apellido_usuario']) ? $_POST['apellido_usuario']:NULL;
	$fechanac_usuario = isset($_POST['fechanac_usuario']) ? $_POST['fechanac_usuario']:NULL;
	$contraseña_usuario = isset($_POST['contraseña_usuario']) ? $_POST['contraseña_usuario']:NULL;
	$pais_usuario = isset($_POST['pais_usuario']) ? $_POST['pais_usuario']:NULL;
	$sexo = isset($_POST['sexo']) ? $_POST['sexo']:5;
	//$acepto = isset($_POST['acepto']) ? 1 : 0 ;
	//$subscripcion_usuario = isset($_POST['subscripcion_usuario']) ? $_POST['subscripcion_usuario']:NULL;
	//$foto_usuario = isset($_POST['foto_usuario']) ? $_POST['foto_usuario']:NULL;
	//$experiencia = isset($_POST['experiencia']) ? $_POST['experiencia']:NULL;
	//$certificacion = isset($_POST['certificacion']) ? $_POST['certificacion']:NULL;
	//$ficha_antropometrica = isset($_POST['ficha_antropometrica']) ? $_POST['ficha_antropometrica']:NULL;
	//$plan_nutricional = isset($_POST['plan_nutricional']) ? $_POST['plan_nutricional']:NULL;
	//$prog_actfisica = isset($_POST['prog_actfisica']) ? $_POST['prog_actfisica']:NULL;
	//$perfil_idperfil = isset($_POST['perfil_idperfil']) ? $_POST['perfil_idperfil']:NULL;
	//$acepto = isset($_POST['acepto']) ? $_POST['acepto']:NULL;
	
		//1.3.1.1. Encriptamos Contraseña
		$contra = sha1(md5($contraseña_usuario));
		$contraseña_usuario = $contra;
		$perfil_idperfil = isset($_POST['perfil_idperfil']) ? $_POST['perfil_idperfil']:NULL;

	//1.3.2. Capturamos la acción (C-U-D) metodo - POST(Form)
		$opera = isset($_POST['operacion']) ? $_POST['operacion']:NULL;
		$del = isset($_POST['del']) ? $_POST['del']:NULL;
	//capturamos la accion (C-U-D) metodo - GET(URL)
		$del = isset($_GET['del']) ? $_GET['del']:NULL;
		$opera = isset($_POST['operacion']) ? $_POST['operacion']:NULL;

	//1.4. Validamos el tipo de operación (Accion (Evento_Vista))
	//1.4.1. Inserción
	if($opera=="Insertar"){
		//Validamos si la variables (PHP) estan llenas y las enviamos al nuestro objeto -> método(parámetros)
		if($correo AND $nombre_usuario AND $apellido_usuario AND $fechanac_usuario AND $contraseña_usuario AND $pais_usuario AND $sexo){
			$musu->ins_usu($correo, $nombre_usuario, $apellido_usuario, $fechanac_usuario, $contraseña_usuario, $pais_usuario, $sexo);
		}

		$correo ="";
		$opera ="";	
		$del ="";
	}

	//1.4.2. Actualizar
	if($opera=="Actualizar"){
		//Validamos si la var(PHP) estan llenas y las enviamos al nuestro objeto -> metodo(parametros)
		if($correo AND $nombre_usuario AND $apellido_usuario AND $fechanac_usuario AND $contraseña_usuario AND $pais_usuario AND $sexo){
			$musu->upd_usu($correo, $nombre_usuario, $apellido_usuario, $fechanac_usuario, $contraseña_usuario, $pais_usuario, $sexo);
		}	
		$correo ="";
		$opera ="";
		$del ="";
	}
	//1.4.3. Eliminar
	if($del){		
		$musu->del_usu($del);
		$correo ="";
		$opera ="";	
		$del ="";
	}
	/*1.5. Creamos la función de nuestra vista (HTML) que se cargara en (vtab.php)*/
function form_registro($correo){
		//Llamamos nuestra modelo (Objeto) e instacionamos 
	    $musu = new musu();
	    	//Listamos nuetros perfiles de nuestro Sistemas para seleccionarlos
			$result = $musu->list_Perfil();
			//Llamamos la consulta de cargar de datos de nuestro user a atualizar(Tabla)
			$result1 = $musu->sel_usu_act($correo);

		// 1.5.1. Creamos nuestro Formulario, en tabla (Columnas y Filas)
		$txt = ''; 
		$txt .= '<div style="margin: auto;">';
			$txt .= '<form action="#" method="POST">';
				$txt .= '<table class="table-secondary">'; // Clase (table) para uso de Bootstrap (Responsibe) https://getbootstrap.com/docs/5.0/content/tables/
					//1raFilas (<tr>)
					$txt .= '<tr>';
						//1ra Cabeceras Negrita (<th>)
						$txt .= '<th align="left">';
							$txt .= 'Correo:';
						$txt .= '</th>';
						//2da Cabecera normal (<td>)
						$txt .= '<td>';
							$txt .= '<input required class="form-control" type="email" name="correo" max="999999999999" value="'.$correo.'"/>';
						$txt .= '</td>';
					//1ra Fila Cierre
					$txt .= '</tr>';
					//2da Filas (<tr>)
					$txt .= '<tr>';
						//1ra Cabeceras Negrita (<th>)
						$txt .= '<th align="left">';
							$txt .= 'Nombre:';
						$txt .= '</th>';
						//2da Cabecera normal (<td>)
						$txt .= '<td>';
							$txt .= '<input required class="form-control" type="text" name="nombre_usuario" maxlength="50" value="';
						if ($correo)
						$txt .= $result1[0]["nombre_usuario"];
						$txt .= '"/>';
						$txt .= '</td>';
					//2da Fila Cierre
					$txt .= '</tr>';
					//3ra Filas (<tr>)
					$txt .= '<tr>';
						//1ra Cabeceras Negrita (<th>)
						$txt .= '<th align="left">';
							$txt .= 'Apellido:';
						$txt .= '</th>';
						//2da Cabecera normal (<td>)
						$txt .= '<td>';
							$txt .= '<input required class="form-control" type="text" name="apellido_usuario" maxlength="50" value="';
						if ($correo)
						$txt .= $result1[0]["apellido_usuario"];
						$txt .= '"/>';
						$txt .= '</td>';
					//3ra Fila Cierre
					$txt .= '</tr>';
					//4ta Filas (<tr>)
					$txt .= '<tr>';
						//1ra Cabeceras Negrita (<th>)
						$txt .= '<th align="left">';
							$txt .= 'Fecha de Nacimiento';
						$txt .= '</th>';
						//2da Cabecera normal (<td>)
						$txt .= '<td>';
							$txt .= '<input required class="form-control" type="date" name="fechanac_usuario" maxlength="50" value="';
						if ($correo)
						$txt .= $result1[0]["fechanac_usuario"];
						$txt .= '"/>';
						$txt .= '</td>';
					//4ta Fila Cierres
					$txt .= '</tr>';
					//5ta Filas (<tr>)
					$txt .= '<tr>';
						//1ra Cabeceras Negrita (<th>)
						$txt .= '<th align="left">';
							$txt .= 'contraseña:';
						$txt .= '</th>';
						//2da Cabecera normal (<td>)
						$txt .= '<td>';
							$txt .= '<input required class="form-control" type="password" name="contraseña_usuario" maxlength="50" value="';
						if ($correo)
						$txt .= $result1[0]["contraseña_usuario"];
						$txt .= '"/>';
						$txt .= '</td>';
					//5ta Fila Cierre
					$txt .= '</tr>';

					//6ta Filas (<tr>)
					$txt .= '<tr>';
						//1ra Cabeceras Negrita (<th>)
						$txt .= '<th align="left">';
							$txt .= 'Pais usuario';
						$txt .= '</th>';
						//2da Cabecera normal (<td>)
						$txt .= '<td>';
							$txt .= '<input required class="form-control" type="text" name="pais_usuario" maxlength="50" value="';
						if ($correo)
						$txt .= $result1[0]["pais_usuario"];
						$txt .= '"/>';
						$txt .= '</td>';
					//6ta Fila Cierre
					$txt .= '</tr>';

					//7ta Filas (<tr>)
					$txt .= '<tr>';
						//1ra Cabeceras Negrita (<th>)
						$txt .= '<th align="left">';
							$txt .= 'sexo';
						$txt .= '</th>';
						//2da Cabecera normal (<td>)
						$txt .= '<td>';
							$txt .= '<input required class="form-control" type="number" name="sexo" maxlength="50" value="';
						if ($correo)
						$txt .= $result1[0]["sexo"];
						$txt .= '"/>';
						$txt .= '</td>';
					//7ta Fila Cierre
					$txt .= '</tr>';


					/*$txt .= '<tr>';
						$txt .= '<th align="left">';
							$txt .= 'acepto';
						$txt .= '</th>';
						$txt .= '<td>';
							$txt .= '<input required class="form-control" type="checkbox" name="acepto" value="1"'; // Establece el valor a 1 cuando esté marcado
						if ($correo && $result1[0]["acepto"] == 1) {
						$txt .= ' checked'; // Marca el checkbox si la condición se cumple
						}
						$txt .= '/>';
						$txt .= '</td>';
					$txt .= '</tr>';*/

					/*//16ta Fila Inicio (tr)
					$txt .= '<tr>';
					$txt .= '<th align="left">';
						$txt .= 'Perfil: ';
						//$txt .= $result[0]["id_perfil"];
					$txt .= '</th>';
					$txt .= '<td>';
						$txt .= '<select class="form-select" name="correo">';
						foreach ($result as $f) {
							$txt .= '<option value="'.$f['idperfil'].'" ';
							if($f['idperfil'] and $f['idperfil']==$result1[0]["correo"])
								$txt .="SELECTED";
							$txt .= ' >'.$f['nomperf'].'</option>';
						}
						$txt .= '</select>';
					$txt .= '</td>';
					//16ta Fila Cierre
					$txt .= '</tr>';*/



					//Insertamos el Boton Centrado
					$txt .= '<tr>';
					$txt .= '<th colspan="2" style="text-align: center;">';
						$txt .= '<input class="btn btn-success" type="submit" name="operacion" value="';
						if ($correo)
							$txt .= 'Actualizar';
						else
							$txt .= 'Insertar';
					$txt .= '" />';
					//Cierre Boton
					$txt .= '</tr>';
				//Cierre Tabla	
				$txt .= '</table>';
			//Cierre Formulario	
			$txt .= '</form>';
		//Cierre Etiqueta DIV	
		$txt .= '</div>';
		//Imprimimos el Formulario(Vista)
		echo $txt;
		
	}	/*1.6. Creamos la función de nuestra vista (HTML) Listar_Registro*/
function tabla_mostrar(){
		$musu = new musu();
		$result = $musu->sel_usu();
		$txt = '';
		$txt .= '<div class="table-responsive-md">';
			$txt .= '<table class="table" width="100%" cellspacing="0px" align="center">';
				//Inicio de la (Cabecera_Tb)			
				$txt .= '<tr>';
					$txt .= '<th>';
						$txt .= 'CORREO';
					$txt .= '</th>';
					$txt .= '<th>';
						$txt .= 'Nombre(s)';
					$txt .= '</th>';
					$txt .= '<th>';
						$txt .= 'Apellido(s)';
					$txt .= '</th>';
					$txt .= '<th>';
						$txt .= 'Fecha Nacimiento';
					$txt .= '</th>';
					$txt .= '<th>';
						$txt .= 'Password';
					$txt .= '</th>';
					$txt .= '<th>';
						$txt .= 'Pais';
					$txt .= '</th>';
					$txt .= '<th>';
						$txt .= 'Sexo';
					$txt .= '</th>';
					$txt .= '<th>';
						$txt .= 'Terminos';
					$txt .= '</th>';
					/*
					$txt .= '<th>';
						$txt .= 'Tipo usuario';
					$txt .= '</th>';
					*/
					$txt .= '<th>Actualizar</th>';
					$txt .= '<th>Eliminar</th>';
				$txt .= '</tr>';
				//Cierre de la (Cabecera_Tb)
				foreach ($result as $f) {
				//Inicio ROW - Datos de la tabla
				$txt .= '<tr>';
					$txt .= '<td align="center">';	
						$txt .= $f["correo"];
					$txt .= '</td>';

					$txt .= '<td align="center">';	
						$txt .= $f["nombre_usuario"];
					$txt .= '</td>';

					$txt .= '<td align="center">';	
						$txt .= $f["apellido_usuario"];
					$txt .= '</td>';

					$txt .= '<td align="center">';	
						$txt .= $f["fechanac_usuario"];
					$txt .= '</td>';

					$txt .= '<td align="center">';	
						$txt .= $f["contraseña_usuario"];
					$txt .= '</td>';

					$txt .= '<td align="center">';	
						$txt .= $f["pais_usuario"];
					$txt .= '</td>';

					$txt .= '<td align="center">';	
						$txt .= $f["sexo"];
					$txt .= '</td>';

					$txt .= '<td align="center">';	
						$txt .= $f["acepto"];
					$txt .= '</td>';
					
					/*
					$txt .= '<td align="center">';	
						$txt .= $f["perfil_idperfil"];
					$txt .= '</td>';
					*/



					//ICONOS-MOdificar (Boton)
					$txt .= '<td align="center"><a href="home.php?pg=109&correo='.$f["correo"].'">
						Actualizar</a></td>';
					//ICONOS-Eliminar (Boton)
					$txt .= '<td align="center"><a href="home.php?pg=109&del='.$f["correo"].'">
						Eliminar</a></td>';
				//Cierre ROW - Datos de la tabla
				$txt .= '</tr>';
				}
			$txt .= '</table>';
		$txt .= '</div>';
		echo $txt;
		
	}




?>
