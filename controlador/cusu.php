<?php 
//1.2. Incluimos nuestra conexión y modelo 
	require_once ("modelo/conexion.php");
	include ("modelo/musu.php");

	//Incluimos nuetro metodo de paginacion
	require_once('modelo/mpagina.php');
	//Facilidad a la hora de direccionar paginación en la que visualizaremos el resultado.(Filtro)
	$pg = 110;
	//variable . $arc
	$arc = "home.php";


	//1.3. Instanciamos el modelo a variable php
	$musu = new musu();

	//Declaracion de variable filtro php que nos servira para paginar
	$filtro = isset ($_GET['filtro']) ? $_GET['filtro']:NULL;

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
		if($correo AND $nombre_usuario AND $apellido_usuario AND $fechanac_usuario AND $contraseña_usuario AND $pais_usuario AND $perfil_idperfil){
			$musu->ins_usu($correo, $nombre_usuario, $apellido_usuario, $fechanac_usuario, $contraseña_usuario, $pais_usuario, $perfil_idperfil);
		}

		$correo ="";
		$opera ="";	
		$del ="";
	}

	//1.4.2. Actualizar
	if($opera=="Actualizar"){
		//Validamos si la var(PHP) estan llenas y las enviamos al nuestro objeto -> metodo(parametros)
		if($correo AND $nombre_usuario AND $apellido_usuario AND $fechanac_usuario AND $contraseña_usuario AND $pais_usuario AND $perfil_idperfil){
			$musu->upd_usu($correo, $nombre_usuario, $apellido_usuario, $fechanac_usuario, $contraseña_usuario, $pais_usuario, $perfil_idperfil);
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

	//Paginación 
	$bo = '';
	//Variable numero de registros a mostrar
	$nreg = 2;
	//Crea un objeto [pa] que se instanciara la clase [mpagina.php]
	$pa = new mpagina();
	$preg = $pa->mpagin($nreg);
	
	//Variable de cant_num_registros
	$conp = $musu->selcount($filtro);

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
							$txt .= 'Pais';
						$txt .= '</th>';
						//2da Cabecera normal (<td>)
						$txt .= '<td>';
							$txt .= '<input required class="form-control" type="text" name="pais_usuario" maxlength="50" value="';
						if ($correo)
						$txt .= $result1[0]["pais_usuario"];
						$txt .= '"/>';
						$txt .= '</td>';
					//5ta Fila Cierre
					$txt .= '</tr>';


					//6ta Filas (<tr>)
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
					//6ta Fila Cierre
					$txt .= '</tr>';


					//7ta Fila Inicio (tr)
					$txt .= '<tr>';
					$txt .= '<th align="left">';
						$txt .= 'Perfil: ';
						//$txt .= $result[0]["id_perfil"];
					$txt .= '</th>';
					$txt .= '<td>';
						$txt .= '<select class="form-select" name="perfil_idperfil">';
						foreach ($result as $f) {
							$txt .= '<option value="'.$f['idperfil'].'" ';
							if($correo){
							if($f['idperfil'] and $f['idperfil']==$result1[0]["perfil_idperfil"])
								$txt .="SELECTED";
							$txt .= ' >'.$f['nomperf'].'</option>';
						}
						$txt .= "SELECTED";
							$txt .= '>' .$f['nomperf']. '</option>';
						}
						$txt .= '</select>';
					$txt .= '</td>';
					//7ta Fila Cierretr
					$txt .= '</tr>';



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
		
	}	
	/*1.6. Creamos la función de nuestra vista (HTML) Listar_Registro*/
	function tabla_mostrar($conp, $nreg, $pg, $bo,$filtro, $arc){
		$musu = new musu();

		$pa = new mpagina();
		//$result = $musu->sel_usu();
		$txt = '';

		// Creamos el cuadro de buscar  (filtros-Busquedas)
		$txt .= '<table class= "table">';
			//Una fila
			$txt .= "<tr>";
				$txt .= "<td>";
					//1ra columna - Formulario buscar
					$txt .= "<form name='forfil' method='GET' action='".$arc."'>";
						$txt .= "<input type='hidden' name='pg' value='".$pg."'/>";
						//Campo de texto para escribir el dato a buscar
						$txt .= "Buscar:<input type ='text' name='filtro' value='".$filtro."' placeholder='Nombre del usuario' onChage='this.form.submit();'/>";
					$txt .="</form>";
				$txt .= "</td>";
				//2da Columna control de paginación
				$txt .= "<td align='right';>";
					$bo = "<input type='hidden' name='filtro' value='".$filtro."'/>";
					//Llamamos el metodo de contar la cantidad de paginas
					$txt .= $pa->spag($conp, $nreg, $pg, $bo, $arc);
					//Llamar los datos para completar la paginación
					$result = $musu->sel_usu($filtro,$pa->rvalini(),$pa->rvalfin());
				$txt .= "</td>";
			//Cierre Fila
			$txt .="</tr>";
		$txt .="</table>";




		if($result){
			$txt .= '<div class="table-responsive-md">';
				$txt .= '<table class="table" width="100%" cellspacing="0px" align="center">';
					//Inicio de la (Cabecera_Tb)			
					$txt .= '<tr>';
						$txt .= '<th>';
							$txt .= 'Correo';
						$txt .= '</th>';
						$txt .= '<th>';
							$txt .= 'Nombre(s)';
						$txt .= '</th>';
						$txt .= '<th>';
							$txt .= 'Apellido(s)';
						$txt .= '</th>';
						$txt .= '<th>';
							$txt .= 'Fecha de Nacimiento';
						$txt .= '</th>';
						$txt .= '<th>';
							$txt .= 'Pais';
						$txt .= '</th>';
						$txt .= '<th>';
							$txt .= 'Contraseña';
						$txt .= '</th>';
						$txt .= '<th>';
							$txt .= 'Perfil';
						$txt .= '</th>';
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
							$txt .= $f["pais_usuario"];
						$txt .= '</td>';
	
						$txt .= '<td align="center">';
							$txt .= $f["contraseña_usuario"];
						$txt .= '</td>';
	
						$txt .= '<td align="center">';	
							$txt .= $f["correo"];
						$txt .= '</td>';
	
						//ICONOS-MOdificar (Boton)
						$txt .= '<td align="center"><a href="home.php?pg=110&correo='.$f["correo"].'">
							Actualizar</a></td>';
						//ICONOS-Eliminar (Boton)
						$txt .= '<td align="center"><a href="home.php?pg=110&del='.$f["correo"].'">
							Eliminar</a></td>';
					//Cierre ROW - Datos de la tabla
					$txt .= '</tr>';
					}
				$txt .= '</table>';
			$txt .= '</div>';
			}
	
			else{
				$txt .='<div>';
				$txt .='<h3>No existen datos registrados en la base de datos</h3>';
				$txt .='</div>';
			}
	
			echo $txt;
			
	}
		
	




?>
