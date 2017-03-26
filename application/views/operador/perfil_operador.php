<div class="content-wrapper">
   <section class="content">
      <!-- Main row -->   
      <div class="row">
         <!-- Profile Image -->
         <div class="box box-primary">
            <div class="box-body box-profile">
               <h3 class="profile-username text-center">Datos Personales</h3>
               <img class="profile-user-img img-responsive img-circle" src="<?=base_url()?>assets/dist/img/<?php echo $this->session->userdata('foto'); ?>" alt="User profile picture">
               <h3 class="profile-username text-center"><?php echo $unOperador[0]->nomyap ?></h3>
               <p class="text-muted text-center"><?php echo $this->session->userdata('perfil') ?></p>
            </div>
            <div class="col-md-12">
               <!-- Horizontal Form -->
               <div class="box box-primary">
                  <div class="box-header with-border">
                     <h3 class="box-title">Datos de Operador:</h3>
                  </div>
                  <div class="box-body">
                     <form role="form-horizontal">
                        <div class="form-group">
                           <label for="nomyap" class="col-md-3 control-label">
                              <center>Nombre y Apellido</center>
                           </label>
                           <div class="col-md-9">
                              <input type="text" class="" id="nombre" name="nombre" placeholder="Nombre y Apellido" value="<?php echo $unOperador[0]->nomyap ?>" style="text-transform:uppercase;" onkeypress="return validar(event)" onkeyup="javascript:this.value=this.value.toUpperCase();">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="nomyap" class="col-md-3 control-label">
                              <center>Usuario</center>
                           </label>
                           <div class="col-md-9">
                              <input type="text" class="" id="nombre" name="nombre" placeholder="Nombre y Apellido" value="<?php echo $unOperador[0]->usuario ?>" style="text-transform:uppercase;" onkeypress="return validar(event)" onkeyup="javascript:this.value=this.value.toUpperCase();">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="nomyap" class="col-md-3 control-label" >
                              <center>Contraseña</center>
                           </label>
                           <div class="col-md-9">
                              <input type="password" class="" id="pass" name="pass" placeholder="Contraseña" value="<?php echo $unOperador[0]->contraseña ?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="nomyap" class="col-md-3 control-label" >
                              <center>Repetir Contraseña</center>
                           </label>
                           <div class="col-md-9">
                              <input type="password" class="" id="pass" name="pass" placeholder="Contraseña" value="<?php echo $unOperador[0]->contraseña ?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="nomyap" class="col-md-3 control-label" >
                              <center>Fecha de Registracion</center>
                           </label>
                           <div class="col-md-9">
                              <input type="text" class="" id="nombre" name="nombre" placeholder="Nombre y Apellido" value="<?php echo $unOperador[0]->fechaReg ?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="nomyap" class="col-md-3 control-label">
                              <center>DNI</center>
                           </label>
                           <div class="col-md-9">
                              <input type="text" class="" id="nombre" name="nombre" placeholder="Nombre y Apellido" value="<?php echo $unOperador[0]->dni ?>"onkeypress="return NumbersOnly(event);">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="nomyap" class="col-md-3 control-label">
                              <center>Telefono</center>
                           </label>
                           <div class="col-md-9">
                              <input type="text" class="" id="nombre" name="nombre" placeholder="Nombre y Apellido" value="<?php echo $unOperador[0]->telefono ?>"onkeypress="return NumbersOnly(event);">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="nomyap" class="col-md-3 control-label">
                              <center>Email</center>
                           </label>
                           <div class="col-md-9">
                              <input type="text" class="" id="nombre" name="nombre" placeholder="Nombre y Apellido" value="<?php echo $unOperador[0]->email ?>" style="text-transform:uppercase;" onkeypress="return validar(event)" onkeyup="javascript:this.value=this.value.toUpperCase();">
                           </div>
                        </div>
                        <!--      <div class="form-group">
                           <label for="nomyap" class="col-sm-3 control-label"><center>Localidad</center></label>
                           <div class="col-sm-9">
                           <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre y Apellido" value="<?php echo $unOperador[0]->localidad ?>" style="text-transform:uppercase;" onkeypress="return validar(event)" onkeyup="javascript:this.value=this.value.toUpperCase();" disabled="">
                           </div>
                           </div>     -->        
                        <!-- /.box-body -->
                        <div class="box-footer pull-right">
                           <button type="button" class="btn btn-primary">Cancelar</button>
                           <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <!-- /.box-body -->
         </div>
      </div>
      <!-- /.row -->
   </section>
</div>

