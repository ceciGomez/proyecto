<div class="content-wrapper">
   <section class="content">
      <!-- Main row -->   
      <div class="row">
         <!-- Profile Image -->
         <div class="box box-primary">
            <div class="box-body box-profile">
               <h3 class="profile-username text-center">Datos Personales</h3>
               <img class="profile-user-img img-responsive img-circle" src="<?=base_url()?>assets/dist/img/<?php echo $this->session->userdata('foto'); ?>" alt="User profile picture">
               <h3 class="profile-username text-center"><?php echo $unAdministrador[0]->nomyap ?></h3>
               <p class="text-muted text-center"><?php echo $this->session->userdata('perfil') ?></p>
            </div>
           
            <!-- /.box-body -->
         </div>
      </div>
      <!-- /.row -->
   </section>
   <section class="content">
      <div class="modal" id="Editar">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h3 class="modal-title" style="color:white" >Edición Administrador</h3>
               </div>
               <div class="modal-body">
                  <?php if( $exito ==TRUE) { ?>
                  <div>
                     <img src="<?=base_url().'images/exito.png'?>" width='40px' height="40px" > 
                     <h3> El administrador se editó exitosamente.</h3>
                  </div>
                  <?php } else{ ?>
                  <div>
                     <img src="<?=base_url().'images/error.png'?>" width='40px' height="40px" > 
                     <label>
                        <h3>El administrador no se pudo editar, compruebe que los campos de edición sean correctos.</h3>
                     </label>
                  </div>
                  <?php } ?>
               </div>
               <div class="modal-footer">
                  <a href="" class="btn btn-default" data-dismiss="modal">Cerrar</a>
                  <?php if($exito==TRUE){
                     ?>
                  <a href="<?=base_url().'index.php/c_administrador/verPerfil'?>" class="btn btn-primary" >Aceptar</a>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <h3  align="center">Editar Administrador</h3>
         <!-- left column -->
         <div class="col-md-12" >
            <!-- general form elements -->
            <div class="box box-primary" >
               <div class="box-body">
                  <div class="form-group">
                     <?=form_open(base_url().'index.php/c_administrador/actualizarAdministrador')?>
                     <div class="row">
                        <div class="col-md-3">
                           <label>Nombre y Apellido:</label><br>
                           <input type='text' name="nomyap" id="nomyap" placeholder="Nombre y Apellido" value='<?php echo $unAdministrador[0]->nomyap; ?>'  style="text-transform:uppercase;" onkeypress="return validar(event)" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>
                        <div class="col-md-3">
                           <label>Usuario :</label><br>
                           <input type="text"  value="<?php echo $unAdministrador[0]->usuario ?>" name="usuario" id="usuario" placeholder="Usuario">
                        </div>
                        <div class="col-md-3">
                           <label>DNI :</label><br>
                           <input type="text" value="<?php echo $unAdministrador[0]->dni ?>" name="dni" id="dni" placeholder="DNI" maxlength="8" onkeypress="return NumbersOnly(event);">
                        </div>
                        <div class="col-md-3">
                           <label>Email :</label><br>
                           <input type="text"  value="<?php echo $unAdministrador[0]->email ?>" name="email" id="email" placeholder="email">
                        </div>
                        <div class="col-md-3">
                           <label>Telefono :</label><br>
                           <input type="text" maxlength="15"   placeholder="+54" value="<?php echo $unAdministrador[0]->telefono ?>" name="telefono" id="telefono" placeholder="teléfono" onkeypress="return NumbersOnly(event);">
                        </div>
                        <div class="col-md-3">
                           <label>Dirección :</label><br>
                           <input type="text" value="<?php echo $unAdministrador[0]->direccion ?>" name="direccion" id="direccion" placeholder="Dirección">
                        </div>
                       
                     </div>
                   
                        <div class="col-md-12" >
                           <label>Cambiar contraseña</label>
                           <input type="checkbox"  name="cambiar_pass" id="cambiar_pass" value="1">
                        </div> <br>
                        <div class="col-md-4">
                           <label for="contraseña" class="col-md-4 control-label" >
                              <center>Contraseña</center>
                           </label>
                           <input type="password" class="" id="contraseña" name="contraseña" placeholder="Contraseña" value="">
                        </div>
                        <div class="col-md-5">
                           <label for="contraseña" class="col-md-5 control-label" >
                           <center>Repetir Contraseña</center>
                           </label>
                           <input type="password" class="" id="repeContraseña" name="repeContraseña" placeholder="Contraseña" value="">
                        </div>
                        
                    
                     <br>
                     <input type="hidden"  value="<?php echo $unAdministrador[0]->idUsuario ?>" name="idUsuario" id="idUsuario" >
                     <div align="center">
                        <button type="submit" data-toggle="modal" class="btn btn-primary">Guardar Cambios</button>
                        <a   class="btn btn-default" style="text-decoration: none;" href="<?=base_url().'index.php/c_administrador/verPerfil'?>" > Cancelar</a>
                     </div>
                     <div align="center" style="color:red;" >
                        <p><?=form_error('nomyap')?></p>
                     </div>
                     <div align="center" style="color:red;" >
                        <p><?=form_error('dni')?></p>
                     </div>
                     <div align="center" style="color:red;" >
                        <p><?=form_error('email')?></p>
                     </div>
                     <div align="center" style="color:red;" >
                        <p><?=form_error('telefono')?></p>
                     </div>
                 
                     </div>
                     <div align="center" style="color:red;" >
                        <p><?=form_error('usuario')?></p>
                     </div>
                     <div align="center" style="color:red;" >
                        <p><?=form_error('contraseña')?></p>
                     </div>
                     <?=form_close()?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<script type="text/javascript">
   $(document).ready(function()
   {
     <?php if ($hizo_post) {  ?>
     $("#Editar").modal("show");
   <?php } ?>
   });
   
    if (document.getElementById("estadoBaja").value=="1") {
                         $("#baja")
                           .find("option:contains(Si)")
                           .prop("selected", true);
                          
                     //
                   };
   if (document.getElementById("estadoBaja").value=="0") {
                         $("#baja")
                           .find("option:contains(No)")
                           .prop("selected", true);
                          
                     //
                   };
   
   
</script>

