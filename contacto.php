<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">
    <title>ffaa status</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">
    
</head>
<body>
    <header>
        <h1>
            <img src="./resources/img/FFAAstatuslogo.png" class="logo" alt="logo">
        </h1>
        <nav>
            <a href="index.html">inicio</a>
            <a href="contacto.php">contacto</a>
            <a class="btn" href="login.php">Log in</a>
        </nav>

    </header>
    <main class="contenedor-formulario">
        <form class="formulario" action="" method="post" >
            <fieldset>
                <legend>Tus Datos</legend>
                <div class="campo">
                    
                    <input id="nombre" type="text" placeholder="tu nombre" required>
                </div>
                
                <div class="campo">
                    
                    <input id="correo" type="email" placeholder="tu correo" required>
                </div>

                <div class="campo">
                    
                    <input id="telefono" type="tel" placeholder="tu telefono"required>
                </div>
                
                <div class="campo">
                    
                    <input id="asunto" type="text" placeholder="asunto"required>
                </div>

                <div class="campo">
                    
                    <textarea name="mensaje" id="" placeholder="hay un maximo de 300 caracteres" maxlength="300" required></textarea>
                </div>

            </fieldset>

            <fieldset>
                <legend>Pais</legend>
                <div class="campo">
                    
                    <select id="pais">
                        <option value="" disabled selected>-- seleccione --</option>
                        <option value="CHL" >Chile</option>
                        <option value="MX" >México</option>
                        <option value="AR" >Argentina</option>                      
                    </select>
                </div>

            </fieldset>

            <div class="btn-display">
                <input class="btn btn-form" type="submit" value="Enviar"> 
                <input class="btn btn-form" type="reset" value="Limpiar">
            </div>
            

        </form>
    </main>
    <footer class="pie">
        <p>Todos los derechos reservados Matias Pérez 2022</p>
    </footer>

</body>
</html>