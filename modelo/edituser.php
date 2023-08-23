<?php

require("../modelo/conexion.php");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if(!empty($_POST["actualizar-user"])){
    
    //get data from the form
    $id_usuario = mysqli_real_escape_string($conexion, trim($_POST['id_user']));
    $username = mysqli_real_escape_string($conexion, trim($_POST['name_user_edit']));
    $userlastname = mysqli_real_escape_string($conexion, trim($_POST['lastname_user_edit']));
    $email = mysqli_real_escape_string($conexion, trim($_POST['email_user_edit']));

    //$rol_user_id = $_POST['rol_user_edit']; #defino variables de como quiero guardar los datos de los input
    //$country_user_id = $_POST["pais_user_edit"];
    $branches_user_id = $_POST["rama_user_edit"];
    $ranks_user_id = $_POST["rango_user_edit"];

    $queryedit = "UPDATE user SET username ='$username', userlastname='$userlastname', email='$email', branches_id=$branches_user_id, ranks_id=$ranks_user_id WHERE id=$id_usuario";
    if (mysqli_query($conexion, $queryedit)) {
        echo '<div id="mensaje-modal" class="alert alert-success" role="alert">Se ha actualizado correctamente.</div>';
        echo "<script>
        setTimeout(function() {
        document.getElementById('mensaje-modal').style.display = 'none';
        }, 5000); // Ocultar mensaje después de 3 segundos
        </script>";
    } else {
        echo '<div id="mensaje-modal" class="alert alert-danger" role="alert">Error: No se pudo actualizar.</div>' . mysqli_error($conexion);
        echo "<script>
        setTimeout(function() {
        document.getElementById('mensaje-modal').style.display = 'none';
        }, 5000); // Ocultar mensaje después de 3 segundos
        </script>";
        
    }

}
