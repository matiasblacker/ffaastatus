<!-- Perfil Modal-->
<div class="modal fade" id="perfilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="h3 mb-0 text-gray-800">Perfil de <?php echo $nombreCompleto; ?></h1>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="m-0 font-weight-bold text-primary">Mis datos</h6><br>
                <div>
                    <table class="table">
                        
                        <tr>
                            <th>Nombre </th>
                            <td><?php echo $nombreCompleto; ?></td>
                        </tr>
                                            
                        <tr>
                            <th>Correo </th>
                            <td><?php echo $showemail; ?></td>
                        </tr>
                        <tr>
                            <th>Rol </th>
                            <td><?php echo $user_data['rol_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Pais </th>
                            <td><?php echo $user_data['name_country']; ?></td>
                        </tr>
                        <tr>
                            <th>Rama </th>
                            <td><?php echo $user_data['name_branches']; ?></td>
                        </tr>
                        <tr>
                            <th>Rango </th>
                            <td><?php echo $user_data['name_ranks']; ?></td>
                        </tr>
                    </table>                       
                </div>
            </div>
            <div class="modal-footer">
                <?php if($rol_usuario == 1){ ?>
                    <input class="btn-registrar d-inline-block"  value="Editar perfil" name="editar" data-dismiss="modal" data-toggle="modal" data-target="#editperfil" onclick="$('#perfilModal').modal('hide'); $('#editarperfil').modal('show');">    
                <?php }?>
                <input class="btn-borrar d-inline-block " value="cambiar contraseña" name="editarcontraseña" data-dismiss="modal" data-toggle="modal" data-target="#editpass" onclick="$('#perfilModal').modal('hide'); $('#editpass').modal('show');">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>    


