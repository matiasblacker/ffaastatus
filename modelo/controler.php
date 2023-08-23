<?php

session_start();


if(!empty($_POST["ingresar"])){

    $email = mysqli_real_escape_string($conexion, trim($_POST['email']));
    $password = mysqli_real_escape_string($conexion, trim($_POST['password']));

    if (empty($_POST["email"]) and empty($_POST["password"])) {
        echo "<span id='mensaje' style='color: white; transition: all 0.5s ease; font-size: 15px; background-color:  #e4446b; opacity: 0.8;  padding: 1rem; border-radius: .5rem;'>los campos estan vacios</span>";
        echo "<script>
        setTimeout(function() {
        document.getElementById('mensaje').style.display = 'none';
        }, 3000); // Ocultar mensaje después de 3 segundos
        </script>";

    } else {
        $email=$_POST["email"];
        $password=$_POST["password"];


        $sql=$conexion->query("SELECT * FROM user where email='$email' ");

        if ($sql && $sql->num_rows > 0) {
            $datos = $sql->fetch_object();
            if (password_verify($password, $datos->password)) {
                // Guardar datos en la sesión
                $_SESSION['email'] = $email;
                $_SESSION['nombre'] = $datos->username;
                $_SESSION['apellido'] = $datos->userlastname;
                $_SESSION['id'] = $datos->id;
                $_SESSION['rol'] = $datos->rol_id; 

                // Redirigir al usuario a la página principal
                header("location:./home/index.php");
            } else {
            // Mostrar un mensaje de error o redirigir al usuario
                echo "<span id='mensaje'style='color: white;  transition: all 0.5s ease;  font-size: 15px; background-color:  #e4446b; opacity: 0.8; padding: 1rem; border-radius: .5rem;'>Usuario o contraseña incorrectos</span>";     
                echo "<script>
                setTimeout(function() {
                document.getElementById('mensaje').style.display = 'none';
                }, 3000); // Ocultar mensaje después de 3 segundos
                </script>";
            }    
        }
        

    }
    
}

?>