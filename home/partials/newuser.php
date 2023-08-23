
<!-- Modal -->
<div class="modal fade" id="NuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="NuevoUsuario" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="m-0 font-weight-bold text-primary">Ingrese los datos del nuevo usuario</h6><br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="form-user">  
                    <div class="d-flex flex-column flex-sm-row">
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="name">Nombre (*) :</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="lastname">Apellido (*) :</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-sm-row">
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="email">Email (*) :</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="password">Password (*) :</label>
                                <input type="password" placeholder="Minimo de 8 caracteres" class="form-control" id="password" name="password" required>
                                <button id="show-password3" type="button"><i class="fa fa-eye"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-sm-row">
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="rol" class="form-label">Rol (*) :</label>                               
                                <?php
                                $sqlRol = "SELECT id, rol_name FROM rol";
                                $resultRol = mysqli_query($conexion, $sqlRol);
                                echo "<select class='form-control' id='rol_user' name='rol_user' required>";
                                echo "<option disabled selected>-- seleccione --</option>";
                                while ($rowRol = mysqli_fetch_assoc($resultRol)) {
                                    echo "<option value='".$rowRol['id']."'>".$rowRol['rol_name']."</option>";
                                }
                                echo "</select>";
                                ?>
                            </div>                           
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="pais" class="form-label">Pais (*) :</label>
                                
                                <?php
                                $sqlPais = "SELECT id, name_country FROM country";
                                $resultPais = mysqli_query($conexion, $sqlPais);
                                echo "<select class='form-control' id='pais' name='pais' required>";
                                echo "<option disabled selected>-- seleccione --</option>";
                                while ($rowPais = mysqli_fetch_assoc($resultPais)) {
                                    echo "<option value='".$rowPais['id']."'>".$rowPais['name_country']."</option>";
                                }
                                echo "</select>";
                                ?>
                            </div>
                        </div>
                        
                    </div>
                    <div class="d-flex flex-column flex-sm-row">
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="rama" class="form-label">Rama (*) :</label>                                      
                                <?php
                                $sqlRama = "SELECT id, name_branches FROM branches";
                                $resultRama = mysqli_query($conexion, $sqlRama);
                                echo "<select class='form-control' id='rama' name='rama' required>";
                                echo "<option disabled selected>-- seleccione --</option>";
                                while ($rowRama = mysqli_fetch_assoc($resultRama)) {
                                    echo "<option value='".$rowRama['id']."'>".$rowRama['name_branches']."</option>";
                                }
                                echo "</select>";
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="rango" class="form-label">Rango (*) :</label>                             
                                <?php
                                $sqlRango = "SELECT id, name_ranks FROM ranks";
                                $resultRango = mysqli_query($conexion, $sqlRango);
                                echo "<select class='form-control' id='rango' name='rango' required>";
                                echo "<option disabled selected>-- seleccione --</option>";
                                while ($rowRango = mysqli_fetch_assoc($resultRango)) {
                                    echo "<option value='".$rowRango['id']."'>".$rowRango['name_ranks']."</option>";
                                }
                                echo "</select>";
                                ?>
                            </div>
                        </div>                       
                    </div>
                    <div >
                        <input class="btn-registrar d-inline-block " type="submit" value="Registrar" id="registrar" name="registrar" >
                        <input class="btn-registrar d-inline-block " type="reset" value="Limpiar" name="reset">
                        <?php include('../modelo/adduser.php'); ?>
                    </div>                        
                </form> 
                <div class="modal-footer">                    
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" data-toggle="modal">Cancelar</button>         
                </div>        
            </div>          
        </div>
    </div>
</div>
<script>
    document.getElementById("show-password3").addEventListener("click", function(){
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
