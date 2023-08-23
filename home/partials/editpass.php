<!-- Perfil Modal-->
<div class="modopen fade" id="editpass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <h6 class="m-0 font-weight-bold text-primary">Actualizar contraseña</h6><br>
                <div class="container-uppass">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                        <?php include('../modelo/userpass.php'); ?>
                        
                        <label>contraseña actual</label>
                        <input type="password" class=" form-control"id="current_password" name="current_password" required>
                        <button id="show-password" type="button"><i class="fa fa-eye"></i></button>   
                        <label>Nueva contraseña</label>
                        <input type="password" class=" form-control"id="newpassword" name="newpassword" required>                                
                        <button id="show-password2" type="button"><i class="fa fa-eye"></i></button> 
                        <div>
                            <input class="btn-registrar d-inline-block " type="submit" value="Actualizar" name="updatepass">
                        </div>  
                    </form>
                </div>                                   
            </div>
            <div class="modal-footer">
                
                <button class="btn btn-secondary" type="button" data-dismiss="modal" data-toggle="modal" data-target="#perfilModal" onclick="$('#editpass').modal('hide'); $('#perfilModal').modal('show');">Cancelar</button>
                
            </div>
        </div>
    </div>
</div>    

<script>
    document.getElementById("show-password").addEventListener("click", function(){
        var input = document.getElementById("current_password");
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    });

    document.getElementById("current_password").addEventListener("blur", function(){
        var input = document.getElementById("current_password");
        input.type = "password";
    });    

    document.getElementById("show-password2").addEventListener("click", function(){
        var input = document.getElementById("newpassword");
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    });

    document.getElementById("newpassword").addEventListener("blur", function(){
        var input = document.getElementById("newpassword");
        input.type = "password";
    }); 


</script>