
<!-- Modal -->
<div class="modal fade" id="editperfilModal<?php echo $mostrar['id_soldier']; ?>" tabindex="-1" role="dialog" aria-labelledby="editperfilModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="m-0 font-weight-bold text-primary">Editar registro de <?php echo $namecomplete; ?></h6><br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <input type="text" value="<?php echo $mostrar['id_soldier']; ?>">                                            
                    <div class="d-flex flex-column flex-sm-row">
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="name_soldier">Nombre:</label>
                                <input value="<?php echo $mostrar['name_soldier']; ?>" type="text" class="form-control" id="name_soldier" name="name_soldier" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="lastname_soldier">Apellido:</label>
                                <input value="<?php echo $mostrar['lastname']; ?>" type="text" class="form-control" id="lastname_soldier" name="lastname_soldier" required>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-sm-row">
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="edad_soldier">Edad:</label>
                                <input value="<?php echo $mostrar['age']; ?>" type="number" class="form-control" id="edad_soldier" name="edad_soldier" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="FechaNac">Fecha Nacimiento:</label>
                                <input value="<?php echo $mostrar['date_birth']; ?>" type="date" class="form-control" id="FechaNac" name="FechaNac" required>
                            </div>
                        </div>
                    </div>                  
                    <div class="d-flex flex-column flex-sm-row">
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="dni">DNI:</label>
                                <input value="<?php echo $mostrar['dni']; ?>" type="number" class="form-control" id="dni" name="dni" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="estado" class="form-label">Estado:</label>                                                             
                                <select class='form-control' id='estado' name='estado' required>
                                    <option value="" >-- seleccione --</option>
                                    
                                </select>
                            </div>
                        </div>    
                    </div>
                    <div class="d-flex flex-column flex-sm-row">
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="pais_soldier" class="form-label">Pais:</label>
                                <select class='form-control' id='pais_soldier' name='pais_soldier' required>                                          
                                    <option value="" >-- seleccione --</option>
                                    
                                </select>                               
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="rama_soldier" class="form-label">Rama:</label>
                                <select class='form-control' id='rama_soldier' name='rama_soldier' required>                                          
                                    <option value="" >-- seleccione --</option>
                                    
                                </select>                                             
                            </div>
                        </div>  
                    </div>                             
                    <div class="d-flex flex-column flex-sm-row">                      
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="rango_soldier" class="form-label">Rango:</label>
                                <select class='form-control' id='rango_soldier' name='rango_soldier' required>                                          
                                    <option value="" >-- seleccione --</option>
                                    
                                </select> 
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="unidad">Unidad:</label>
                                <input value="<?php echo $mostrar['unit']; ?>" type="text" class="form-control" id="unidad" name="unidad">
                            </div>
                        </div>                       
                    </div>
                    <div class="d-flex flex-column flex-sm-row">
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="fechaAdm">Fecha Admision:</label>
                                <input value="<?php echo $mostrar['date_admission']; ?>" type="date" class="form-control" id="fechaAdm" name="fechaAdm" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 ">
                                <label for="FechaMU">Fecha Muerte:</label>
                                <input value="<?php echo $mostrar['date_death']; ?>" type="date" class="form-control" id="FechaMU" name="fechaMu">
                            </div>
                        </div>
                    </div>                
                    <div class="d-flex flex-column flex-sm-row">
                        <div class="col-sm-12">
                            <div class="mb-3 ">
                                <label for="lugarMu">Lugar Muerte:</label>
                                <input value="<?php echo $mostrar['place_death']; ?>" type="text" class="form-control" id="lugarMu" name="lugarMu">
                            </div>
                        </div>
                    </div>                
                    <div >
                        <input class="btn-registrar d-inline-block " type="submit" value="Actualizar" name="actualizar_soldier">
                        <input class="btn-registrar d-inline-block " type="reset" value="Limpiar" name="reset">  
                        <?php #include('../modelo/editdatasoldier.php'); ?>                      
                    </div>                                   
                </form> 
                <div class="modal-footer">                          
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" data-toggle="modal">Cancelar</button>         
                </div>        
            </div>          
        </div>
    </div>
</div>

