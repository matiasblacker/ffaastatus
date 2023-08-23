<?php

require("../modelo/conexion.php");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if(!empty($_POST["registrar"])){
    
    //get data from the form
    $username = mysqli_real_escape_string($conexion, trim($_POST['name']));
    $userlastname = mysqli_real_escape_string($conexion, trim($_POST['lastname']));
    $email = mysqli_real_escape_string($conexion, trim($_POST['email']));
    $password = mysqli_real_escape_string($conexion, trim($_POST['password']));
    if (strlen($password) < 8) {
    echo '<div id="mensaje" class="alert alert-warning" role="alert">La contraseña debe tener al menos 8 caracteres.</div>';
    echo "<script>
    setTimeout(function() {
    document.getElementById('mensaje').style.display = 'none';
    }, 5000); // Ocultar mensaje después de 3 segundos
    </script>";
    }
    $rol_user_id = $_POST['rol_user']; #defino variables de como quiero guardar los datos de los input
    $country_id = $_POST["pais"];
    $branches_id = $_POST["rama"];
    $ranks_id = $_POST["rango"];
    if (empty($_POST["name"]) || empty($_POST["lastname"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["rol_user"]) || empty($_POST["pais"]) || empty($_POST["rama"]) || empty($_POST["rango"])) {
        echo '<div id="mensaje-modal" class="alert alert-warning" role="alert">Uno de los campos se encuentra vacío</div>';
        echo "<script>
        setTimeout(function() {
        document.getElementById('mensaje-modal').style.display = 'none';
        }, 5000); // Ocultar mensaje después de 3 segundos
        </script>";
    }else{
        $check_email = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conexion, $check_email);
        if(mysqli_num_rows($result)>0) {
            echo '<div id="mensaje-modal" class="alert alert-warning" role="alert">El correo electrónico ya existe en la base de datos.</div>';
            echo "<script>
            setTimeout(function() {
            document.getElementById('mensaje-modal').style.display = 'none';
            }, 5000); // Ocultar mensaje después de 3 segundos
            </script>";
        }else{
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO user (username, userlastname, email, password, rol_id, country_id, branches_id, ranks_id) VALUES ('$username', '$userlastname', '$email', '$password', $rol_user_id, $country_id, $branches_id, $ranks_id)";
            if (mysqli_query($conexion, $query)) {
                echo '<div id="mensaje-modal" class="alert alert-success" role="alert">El usuario se ha registrado correctamente.</div>';
                echo "<script>
                setTimeout(function() {
                document.getElementById('mensaje-modal').style.display = 'none';
                }, 5000); // Ocultar mensaje después de 3 segundos
                </script>";

            } else {
            
                echo '<div id="mensaje-modal" class="alert alert-danger" role="alert">Error: No se pudo registrar el usuario.</div>' . mysqli_error($conexion);
                echo "<script>
                setTimeout(function() {
                document.getElementById('mensaje-modal').style.display = 'none';
                }, 5000); // Ocultar mensaje después de 3 segundos
                </script>";
                
            }
    
        }
    }       

}

?>
