<?php
    require_once 'configuracion.php';

    class musuario{
        private $con;

        public function __construct(){
            $con = new Conexion();
            $this->con = $con->get_conexion();
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    

        public function resgistrarUsuario($corrusu, $nomusu, $apeusu, $fecusu, $consusu, $paisusu, $sexusu, $termusu) {
            try {
            // Llamar al procedimiento almacenado para verificar el correo
            $sql_verificar = "CALL usuario_registrado(:correo, @usuario_existente)";
            $stmt_verificar = $this->con->prepare($sql_verificar);
            $stmt_verificar->bindParam(':correo', $corrusu);
            $stmt_verificar->execute();
    
            // Obtener el resultado de la verificación
            $sql_resultado = "SELECT @usuario_existente AS usuario_existente";
            $stmt_resultado = $this->con->prepare($sql_resultado);
            $stmt_resultado->execute();
            $resultado = $stmt_resultado->fetch(PDO::FETCH_ASSOC);
    
            if ($resultado['usuario_existente'] > 0) {
                // El correo ya está registrado, muestra un error
                echo "El correo ya está registrado. Por favor, elija otro correo.";
            } else {
                // El correo no está registrado, procede con la inserción
                $sql = "CALL insert_usu(:correo, :nombre, :apellido, :fechanac, :contrasena, :pais, :sexo, :acepto)";
        
                $stmt = $this->con->prepare($sql);
    
                $stmt->bindParam(':correo', $corrusu);
                $stmt->bindParam(':nombre', $nomusu);
                $stmt->bindParam(':apellido', $apeusu);
                $stmt->bindParam(':fechanac', $fecusu);
                $stmt->bindParam(':contrasena', $consusu);
                $stmt->bindParam(':pais', $paisusu);
                $stmt->bindParam(':sexo', $sexusu);
                $stmt->bindParam(':acepto', $termusu);
    
                $stmt->execute();
            }
    
            } catch (PDOException $e) {    
            echo "Error en la base de datos: " . $e->getMessage();
            }
        }

        public function actualizarUsuario($nomusu, $apeusu, $corrusu, $conusu, $fotusu, $paisusu) {
            try {
                $sql = "UPDATE usuario SET ";
                $actualizaciones = array();
        
                if (!empty($nomusu)) {
                    $actualizaciones[] = "nombre_usuario=:nombre";
                }
        
                if (!empty($apeusu)) {
                    $actualizaciones[] = "apellido_usuario=:apellido";
                }
        
                if (!empty($conusu)) {
                    $actualizaciones[] = "contraseña_usuario=:contrasena";
                }
        
                if (!empty($fotusu)) {
                    $actualizaciones[] = "foto_usuario=:fotoPerfil";
                }
        
                if (!empty($paisusu)) {
                    $actualizaciones[] = "pais_usuario=:pais";
                }
        
                if (!empty($actualizaciones)) {
                    $sql .= implode(", ", $actualizaciones);
                    $sql .= " WHERE correo=:correo";
                } else {
                    // Si no hay actualizaciones, no se ejecuta la consulta
                    echo "No hay campos para actualizar";
                    return;
                }

                $stmt = $this->con->prepare($sql);
        
                // Obtener el correo del usuario con la sesión iniciada desde la variable de sesión
                $correoSesion = $_SESSION["correo"];
        
                // Enlazar parámetros
                if (!empty($nomusu)) {
                    $stmt->bindParam(':nombre', $nomusu);
                }
        
                if (!empty($apeusu)) {
                    $stmt->bindParam(':apellido', $apeusu);
                }
        
                if (!empty($conusu)) {
                    $contrasena = sha1(md5($conusu));
                    $stmt->bindParam(':contrasena', $contrasena);
                }
        
                if (!empty($fotusu)) {
                    $stmt->bindParam(':fotoPerfil', $fotusu);
                }
        
                if (!empty($paisusu)) {
                    $stmt->bindParam(':pais', $paisusu);
                }
        
                $stmt->bindParam(':correo', $correoSesion);
        
                // Ejecutar la consulta
                $resultado = $stmt->execute();
        
                if ($resultado) {
                    echo "Datos actualizados";
                } else {
                    echo "No se pudieron actualizar los datos";
                }
        
            } catch (PDOException $e) {
                echo "Error en la base de datos: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Error general: " . $e->getMessage();
            
                // Manejar el tamaño del archivo
                if (strpos($e->getMessage(), 'exceeds the maximum allowed size') !== false) {
                    // Mensaje de error específico para tamaño de archivo excedido
                    echo "Error: El tamaño del archivo excede el límite permitido. Por favor, selecciona un archivo más pequeño.";
                }
            }
            
        }   

        public function obtenerFoto(){
            $correo = $_SESSION["correo"];
            $sql = " SELECT foto_usuario FROM usuario WHERE correo=:correo";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":correo", $correo);
            $stmt->execute();
            $rutaFoto = $stmt->fetchColumn();

             return $rutaFoto;
          }

          public function eliminarCuenta($con) {
            $correo = $_SESSION["correo"];
        
            // Obtener la contraseña almacenada en la base de datos
            $verificacion = "SELECT contraseña_usuario FROM usuario WHERE correo=:correo";
            $stmt2 = $this->con->prepare($verificacion);
            $stmt2->bindParam(":correo", $correo);
            $stmt2->execute();
            $contrasenaAlmacenada = $stmt2->fetchColumn();
        
            // Encriptar la contraseña ingresada para compararla con la almacenada
            $conEncriptada = sha1(md5($con));
        
            // Verificar la contraseña ingresada
            if ($conEncriptada !== $contrasenaAlmacenada) {
                echo "La contraseña ingresada no es la correcta";
            } else {
                // Eliminar la cuenta si la contraseña es correcta
                $sql = "DELETE FROM usuario WHERE correo=:correo";
                $stmt = $this->con->prepare($sql);
                $stmt->bindParam(":correo", $correo);
                $resultado = $stmt->execute();
        
                // Verificar el resultado de la eliminación
                if ($resultado) {
                    echo "Cuenta eliminada";
                    session_destroy();
                    header('Location: /hr/index.php');
                } else {
                    echo "No fue posible eliminar la cuenta";
                }
            }
        }
    }
?>