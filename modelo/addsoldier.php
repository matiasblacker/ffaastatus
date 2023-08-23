<?php

require("../modelo/conexion.php");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}


if(!empty($_POST["registrar_soldier"])){
    
    //get data from the form
    $name_soldier = mysqli_real_escape_string($conexion, trim($_POST['name_soldier']));
    $lastname = mysqli_real_escape_string($conexion, trim($_POST['lastname_soldier']));
    $age = mysqli_real_escape_string($conexion, trim($_POST['edad_soldier']));
    $date_birth = $_POST['FechaNac'];
    $dni = mysqli_real_escape_string($conexion, trim($_POST['dni']));
    $status_id_soldier = $_POST['estado'];
    $country_id_soldier = $_POST["pais_soldier"];
    $branches_id_soldier = $_POST["rama_soldier"];
    $ranks_id_soldier = $_POST["rango_soldier"];
    $date_admission = $_POST['fechaAdm'];

    $unit = mysqli_real_escape_string($conexion, trim($_POST['unidad']));
    if (empty($unit)){
        $unit = '';  
    }
    $date_death = $_POST['fechaMu'];
    if(empty($date_death)){
        $date_death = '';
    }
    $place_death = mysqli_real_escape_string($conexion, trim($_POST['lugarMu']));
    if(empty($place_death)){
        $place_death = '';      
    }
    
    $check_dni = "SELECT * FROM soldier WHERE dni='$dni'";
    $resultdni = mysqli_query($conexion, $check_dni);
    if (mysqli_num_rows($resultdni)>0) {
        echo '<div id="mensaje" class="alert alert-warning" role="alert">El DNI ingresado ya existe en la base de datos</div>';
        echo "<script>
        setTimeout(function() {
        document.getElementById('mensaje').style.display = 'none';
        }, 5000); // Ocultar mensaje después de 3 segundos
        </script>";
    } else {
        $query1 = "INSERT INTO soldier (name_soldier, lastname, age, date_birth, dni, status_id, country_id, branches_id, ranks_id, unit, date_admission, date_death, place_death) 
        VALUES ('$name_soldier', '$lastname', '$age', '$date_birth', '$dni', '$status_id_soldier', '$country_id_soldier', '$branches_id_soldier', '$ranks_id_soldier', ".(empty($unit) ? 'NULL' : "'$unit'").", '$date_admission', ".(empty($date_death) ? 'NULL' : "'$date_death'").", ".(empty($place_death) ? 'NULL' : "'$place_death'").")";

        if (mysqli_query($conexion, $query1)) {
            echo '<div id="mensaje" class="alert alert-success" role="alert">Registro agregado.</div>';
            echo "<script>
            setTimeout(function() {
            document.getElementById('mensaje').style.display = 'none';
            }, 5000); // Ocultar mensaje después de 3 segundos
            </script>"; 
        } else {           
            echo '<div id="mensaje" class="alert alert-danger" role="alert">Error: No se pudo añadir el registro.</div>' . mysqli_error($conexion);
            echo "<script>
            setTimeout(function() {
            document.getElementById('mensaje').style.display = 'none';
            }, 5000); // Ocultar mensaje después de 3 segundos
            </script>";           
        } 
    }                   
}

?>
