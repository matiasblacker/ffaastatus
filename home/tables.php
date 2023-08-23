<?php

session_start();

if (!isset($_SESSION['id'])) {
    // Si no ha iniciado sesión, redirigir al usuario al formulario de login
    header("location:../login.php");
}
$nombreCompleto = $_SESSION['nombre'] . ' ' . $_SESSION['apellido'];
$showemail = $_SESSION['email'];
$rol_usuario = $_SESSION['rol'];
$showid = $_SESSION['id'];

include("../modelo/showdatauser.php");

//Datos de los soldados

$sql = "SELECT soldier.*, status.name_status as status_name, country.name_country as country_name, branches.name_branches as branches_name, ranks.name_ranks as ranks_name
    FROM soldier
    INNER JOIN status ON soldier.status_id = status.id
    INNER JOIN country ON soldier.country_id = country.id
    INNER JOIN branches ON soldier.branches_id = branches.id
    INNER JOIN ranks ON soldier.ranks_id = ranks.id";
$resultx = mysqli_query($conexion, $sql);

//datos para añadir usuarios

$sqlEstado = "SELECT id, name_status FROM status";
$resultEstado = mysqli_query($conexion, $sqlEstado);

$sqlCountry = "SELECT id, name_country FROM country";
$resultcountry = mysqli_query($conexion, $sqlCountry);

$sqlRama = "SELECT id, name_branches FROM branches";
$resultBranche = mysqli_query($conexion, $sqlRama);

$sqlRango = "SELECT id, name_ranks FROM ranks";
$resultRank = mysqli_query($conexion, $sqlRango);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard - FFAASTATUS</title>
    <!-- Custom fonts for this template-->
    <!--<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
    <script src="https://kit.fontawesome.com/d78cf7985a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/app.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
        require('./partials/menu.php')
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php
                require('./partials/toolbar.php')
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <a href="#" data-toggle="modal" data-target="#NuevoSoldado" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-md"><i class="fa-solid fa-address-card">
                            </i> Añadir combatiente</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registros de combatientes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Edad</th>
                                            <th scope="col">DNI</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Pais</th>
                                            <th scope="col">Unidad</th>
                                            <th scope="col">Fecha Muerte</th>
                                            <th scope="col">Lugar muerte</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($mostrar = mysqli_fetch_array($resultx)) {
                                            $namecomplete = $mostrar['name_soldier'] . ' ' . $mostrar['lastname'];
                                        ?>
                                            <tr>
                                                <td><?php echo $mostrar['id_soldier'] ?></td>
                                                <td><?php echo $namecomplete ?></td>
                                                <td><?php echo $mostrar['age'] ?></td>
                                                <td><?php echo $mostrar['dni'] ?></td>
                                                <td><?php echo $mostrar['status_name'] ?></td>
                                                <td><?php echo $mostrar['country_name'] ?></td>
                                                <td><?php echo $mostrar['unit'] ?></td>
                                                <td><?php echo $mostrar['date_death'] ?></td>
                                                <td><?php echo $mostrar['place_death'] ?></td>
                                                <td>
                                                    <a class="btn btn-sm btn-light" data-toggle="modal" data-target="#soldierperfilModal">Ver</a>
                                                    <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editperfilModal<?php echo $mostrar['id_soldier']; ?>">Editar</a>
                                                    <a class="btn btn-sm btn-danger">Eliminar</a>
                                                </td>
                                            </tr>

                                            <?php require('./partials/editsoldier.php') ?>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; FFAA STATUS 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- para agregar usuario-->
    <?php require('./partials/newuser.php') ?>
    <!-- ver el perfil se usuario-->
    <?php require('./partials/perfil.php') ?>
    <!-- editar el perfil se usuario-->
    <?php require('./partials/editperfil.php') ?>
    <?php require('./partials/editpass.php') ?>


    <!-- para agregar soldado-->
    <?php require('./partials/newsoldier.php') ?>
    <!-- para ver soldado-->
    <?php require('./partials/perfilsoldier.php') ?>

    <!-- para editar soldado-->



    <!-- para cerrar sesion-->
    <?php require('./partials/modal-logout.php') ?>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>

</html>