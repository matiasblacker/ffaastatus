<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>ffaa status</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/d78cf7985a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">
    
</head>
<body class="bodylogin">

    

    <header>
        <h1>
            <img src="./resources/img/FFAAstatuslogo.png" class="logo" alt="logo">
        </h1>
        <nav>
            <a href="index.html">inicio</a>
            <a href="contacto.php">contacto</a>
        </nav>

    </header>
    <div class="centrarlogo">
        <img class="logocentrado" src="./resources/img/FFAAstatuslogo.png" alt="logocentrado">

        
    </div>
    
    <main class="contenedor-login">
        <fieldset>
            
            <form class="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <?php
                include("./modelo/conexion.php");
                include("./modelo/controler.php");
                ?>
                <br>
                <label for="email"></label><br>
                <input type="email" id="email" name="email" placeholder="User"><br>
    
                <label for="password"></label><br>
                <input type="password" id="password" name="password" placeholder="password">
                <button id="show-password" type="button"><i class="fa fa-eye"></i></button><br><br>
                
                <button class="btn-login" type="submit" value="Login" name="ingresar">Login</button><br>
                <a class="forget" href="./home/forgot-password.php">Olvidaste tu contraseña?</a>
                <br><br>
                
            </form>
            
        </fieldset> 
    </main>
    <footer class="pie">
        <p>Todos los derechos reservados Matías Pérez 2022</p>
    </footer>


    <script>
        document.getElementById("show-password").addEventListener("click", function(){
            var input = document.getElementById("password");
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        });

        document.getElementById("password").addEventListener("blur", function(){
        var input = document.getElementById("password");
        input.type = "password";
        });

    </script>

</body>
</html>