<!-- Perfil Modal-->
<div class="modopen fade" id="editperfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="h3 mb-0 text-gray-800">Perfil de <?php echo $nombreCompleto; ?></h1>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="m-0 font-weight-bold text-primary">Actualizar mis datos</h6><br>
                
                <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="form-user-edit"> 
                    <input type="hidden" value="<?php echo $showid; ?>" name="id_user">
                    <div class="d-flex flex-column flex-sm-row">
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="name_user_edit">Nombre (*) :</label>
                                <input type="text" value="<?php echo $user_data['username']; ?>" class="form-control" id="name_user_edit" name="name_user_edit" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="lastname_user_edit">Apellido (*) :</label>
                                <input type="text" value="<?php echo $user_data['userlastname']; ?>" class="form-control" id="lastname_user_edit" name="lastname_user_edit" required>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-sm-row">
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="email_user_edit">Email (*) :</label>
                                <input type="email" value="<?php echo $showemail; ?>" class="form-control" id="email_user_edit" name="email_user_edit" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="rama_user_edit" class="form-label">Rama (*) :</label>                                      
                                <?php
                                $sqlRama = "SELECT id, name_branches FROM branches";
                                $resultRama = mysqli_query($conexion, $sqlRama);
                                echo "<select class='form-control' id='rama_user_edit' name='rama_user_edit' required>";
                                echo "<option disabled selected>-- seleccione --</option>";
                                while ($rowRama = mysqli_fetch_assoc($resultRama)) {
                                    echo "<option value='".$rowRama['id']."'>".$rowRama['name_branches']."</option>";
                                }
                                echo "</select>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-sm-row">                                             
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="rango_user_edit" class="form-label">Rango (*) :</label>                             
                                <?php
                                $sqlRango = "SELECT id, name_ranks FROM ranks";
                                $resultRango = mysqli_query($conexion, $sqlRango);
                                echo "<select class='form-control' id='rango_user_edit' name='rango_user_edit' required>";
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
                        <input class="btn-registrar d-inline-block " onclick="eventoSubmit()" type="submit" id="actualizar-user" value="Actualizar" name="actualizar-user">
                        <input class="btn-registrar d-inline-block " type="reset" value="Limpiar" name="reset">
                        <?php include('../modelo/edituser.php'); ?>
                    </div>                        
                </form>                      
            </div>
            <div class="modal-footer">
                
                <button class="btn btn-secondary" type="button" data-dismiss="modal" data-toggle="modal" data-target="#perfilModal" onclick="$('#editperfil').modal('hide'); $('#perfilModal').modal('show');">Cancelar</button>
                
            </div>
        </div>
    </div>
</div>    
