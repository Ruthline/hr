<?php
session_start();
require_once('conexion.php');
$user = isset($_POST["user"]) ? $_POST["user"] : NULL;
$pass = isset($_POST["pass"]) ? $_POST["pass"] : NULL;

if (empty($user) || empty($pass)) {
    // Manejar el caso en el que los campos estén vacíos
    echo "<script type='text/javascript'>window.location='../vista/vsignIn.php?errlog=si';</script>";
} else {
    // Llamar al procedimiento almacenado para autenticar
    $resultado = autenticarUsuario($user, $pass);

    if ($resultado) {
        // Autenticación exitosa, realizar acciones necesarias
        $_SESSION["correo"] = $resultado['correo'];
        $_SESSION["nomusu"] = $resultado['nombre_usuario'];
        $_SESSION["idperf"] = $resultado['perfil_idperfil'];
        $_SESSION["apeusu"] = $resultado['apellido_usuario'];
        $_SESSION["autentificado"] = '#--%*_!@-¡';
        echo "<script type='text/javascript'>window.location='../home.php';</script>";
    } else {
        // No se autorizará el ingreso a home.php, redireccionar a la página de inicio de sesión con un mensaje de error
        session_destroy();
        echo "<script type='text/javascript'>window.location='../vista/vsignIn.php?errorusuario=si';</script>";
    }
}

function autenticarUsuario($user, $pass) {
	
	$pp = sha1(md5($pass));
    // Llamamos al procedimiento almacenado para autenticar
    $sql = "CALL valida_usu(:user, :pass)";

    // Esta línea crea una instancia de la clase conexión
    $modelo = new conexion();
    $conexion = $modelo->get_conexion();
    $result = $conexion->prepare($sql);

    // Enviamos los parámetros de nuestra consulta
    $result->bindParam(':user', $user);
    $result->bindParam(':pass', $pp);

    if ($result) {
        // Ejecutamos la consulta (esto realiza la llamada al procedimiento almacenado)
        $result->execute();
    }

    $res = array();
    while ($f = $result->fetch()) {
        $res[] = $f;
    }

    return isset($res[0]) ? $res[0] : null;
}
?>