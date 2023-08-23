<?php 
    require("../modelo/conexion.php");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    
    if(!empty($_POST["updatepass"])){
        
        $showid = $_SESSION['id'];
        $current_password = mysqli_real_escape_string($conexion, trim($_POST['current_password']));
        $new_password = mysqli_real_escape_string($conexion, trim($_POST['newpassword']));
        
        $queryCom = "SELECT password FROM user WHERE id = ?";
        $stmt = $conexion->prepare($queryCom);
        $stmt->bind_param('i', $showid);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $user = $resultado->fetch_assoc();
        if (!password_verify($current_password, $user['password'])) {
            echo '<div id="mensaje-modal" class="alert alert-warning" role="alert">La contraseña actual no coincide con los registros.</div>';
            echo "<script>
            setTimeout(function() {
            document.getElementById('mensaje-modal').style.display = 'none';
            }, 5000); // Ocultar mensaje después de 5 segundos
            </script>";
        }else{
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $queryUp = "UPDATE user SET password ='$new_password' WHERE id=$showid";
            if (mysqli_query($conexion, $queryUp)) {
                echo '<div id="mensaje-modal" class="alert alert-success" role="alert">Contraseña cambiado correctamente.</div>';
                echo "<script>
                setTimeout(function() {
                document.getElementById('mensaje-modal').style.display = 'none';
                }, 5000); // Ocultar mensaje después de 5 segundos
                </script>";
            } else {
                echo '<div id="mensaje-modal" class="alert alert-danger" role="alert">Error: no se pudo cambiar.</div>' . mysqli_error($conexion);
                echo "<script>
                setTimeout(function() {
                document.getElementById('mensaje-modal').style.display = 'none';
                }, 5000); // Ocultar mensaje después de 5 segundos
                </script>";                
            }           
        }    
    }
?>                                   