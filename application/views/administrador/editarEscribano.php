<!-- Content Wrapper. Contains page content -->
<style type="text/css">
 
</style>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
        
        <small>Bienvenido Administrador: <?php echo$this->session->userdata('username') ?></small>
      </h1>
 
   <ol class="breadcrumb">
      <li><a href="<?=base_url()?>index.php/c_administrador>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Editar Escribano</li>
   </ol>
</section>
<!-- Main content -->
<script type="text/javascript">
  $(document).ready(function(){
   $("#Provincia").change(function () {
           $("#Provincia option:selected").each(function () {
         
           //console.log( $('#Provincia').val());
           //pado el numero de pronvicia, es decir el id
            miprovincia=$('#Provincia').val();
            $.post("<?=base_url()?>index.php/c_administrador/mostrarLocalidad", { miprovincia: miprovincia}, function(data){
            $("#Localidad").html(data);
            });            
        });
   })
});
</script>

<section class="content">

      <div class="row">
      <h3  align="center">Editar Escribano</h3>

        <!-- left column -->
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-primary" >
          <div class="box-body" style="background-color: lightblue;">
                    <div class="form-group">    
                      <?=form_open(base_url().'index.php/c_administrador/actualizarEscribano')?>
                         <div class="row">
                          
                            <div class="col-md-3">
                               <label>Nombre y Apellido:</label><br>
                              <input type='text' name="nomyap" id="nomyap" placeholder="Nombre y Apellido" value='<?php echo $escribano->nomyap; ?>'  >
                            </div>

                            <div class="col-md-3">
                               <label>Usuario :</label><br>
                               <input type="text"  value="<?php echo $escribano->usuario ?>" name="usuario" id="usuario" placeholder="Usuario">
                            </div>
                             <div class="col-md-3">
                               <label>Contraseña :</label><br>
                              <input type="password"  value="" name="contraseña" id="contraseña" placeholder="Contraseña">
                            </div>
                         
                         
                          <div class="col-md-3">
                              <label>Matricula :</label><br>
                              <input type="text" value="<?php echo $escribano->matricula ?>" name="matricula" id="matricula" placeholder="Matricula">
                          </div>
                        </div>


                         <div class="row">
                          
                         
                          <div class="col-md-3">
                             <label>DNI :</label><br>
                              <input type="text" value="<?php echo $escribano->dni ?>" name="dni" id="dni" placeholder="DNI">
                          </div>

                          <div class="col-md-3">
                           <label>Estado :</label><br>
                            <input type="hidden" value= '<?php echo $escribano->estadoAprobacion ?>' id="estado"> 
                            <select name="estadoAprobacion" id="estadoAprobacion"  >
                                 <option value=""></option>
                                <option value="P">P</option>
                                <option value="A">A</option>
                                <option value="R">R</option>
                               
                            </select>
                          </div>
                         

                          <div class="col-md-3">
                              <label>Email :</label><br>
                             <input type="text"  value="<?php echo $escribano->email ?>" name="email" id="email" placeholder="email">
                          </div>



                          <div class="col-md-3">
                            <label>Telefono :</label><br>
                            <input type="text"  value="<?php echo $escribano->telefono ?>" name="telefono" id="telefono" placeholder="teléfono">
                          </div>
                        
                        </div>
                       
                         <div class="row">

                          <div class="col-md-3">
                              <label>Dirección :</label><br>
                              <input type="text" value="<?php echo $escribano->direccion ?>" name="direccion" id="direccion" placeholder="Dirección">
                          </div>
                        
             
                          <div class="col-md-3">
                            <?php 
                            $provincias = $this->db->get("provincia")->result();
                                  $id_prov=0;
                                    ?>
                                 <label>Provincia</label>
                                      <select name="provincia" id="Provincia">
                                            <option value="">Selecciona una Provincia</option>
                                            <?php  foreach ($provincias as $p){ ?>
                                               <option value=
                                                <?php
                                               
                                                echo "' $p->idProvincia' > $p->nombre"; }?></option>
                                          

                                        </select>

                                          <div style="color:red;" ><p><?=form_error('provincia')?></p></div>
                                     </div>
                   

                                      
                                       <div class="col-md-3">
                                           <div>
                                          
                                           <label>Localidad</label> 
                                              <select name="localidad" id="Localidad">
                                                   <option value="">Selecciona una Localidad </option>
                                              </select>
                                                <div style="color:red;" ><p><?=form_error('localidad')?></p></div>
                                           </div>
                                       </div>
                                  </div>
                                  <br>
                                  <div>
                                     <input type="hidden"  value="<?php echo $escribano->idEscribano ?>" name="idEscribano" id="idEscribano" placeholder="idEscribano">
                                  </div>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>

                                            <?=form_close()?>

                    
                  
                       </div>
                  </div>      

      
           <?=form_open(base_url().'index.php/c_administrador/actualizarEscribano')?>
                <div class="row">
                   <div class="col-md-4">
                        <div class="form-group has-feedback">
                          <label >Nombre y Apellido</label>
                          <br>
                          <input type="text"  value="<?php echo $escribano->nomyap ?>" name="nomyap" id="nomyap" placeholder="Nombre y Apellido">
                        </div>
                    </div>

                </div>

                <div class="row">
                   <div class="col-md-4">
                      <div class="form-group has-feedback">
                        <label >Usuario</label>
                        <br>
                        <input type="text"  value="<?php echo $escribano->usuario ?>" name="usuario" id="usuario" placeholder="Usuario">
                       </div>
                    </div>
               </div>
                <div class="row">
                   <div class="col-md-3">
                      <div class="form-group has-feedback">
                        <label >Contraseña</label>
                        <br>
                        <input type="password"  value="" name="contraseña" id="contraseña" placeholder="Contraseña">
                        </div>
                        </div>
                    </div>

                <div class="row">
                   <div class="col-md-3">         
                      <div class="form-group has-feedback">
                        <label >DNI</label>
                        <br>
                        <input type="text" value="<?php echo $escribano->dni ?>" name="dni" id="dni" placeholder="DNI">
                       </div>
                    </div>
                    </div>
                 <div class="row">
                   <div class="col-md-3">
                      <div class="form-group has-feedback">
                        <label >Matricula</label>
                        <br>
                        <input type="text" value="<?php echo $escribano->matricula ?>" name="matricula" id="matricula" placeholder="Matricula">
                       </div>
                       </div>
                    </div>

                    <div class="row">
                   <div class="col-md-3">

                           <div class="form-group has-feedback">
                          <label >Estado</label>
                          <br>
                          <input type="text" value="<?php echo $escribano->estadoAprobacion ?>" name="estadoAprobacion" id="estadoAprobacion" placeholder="estadoAprobacion">
                         </div>
                         </div>
                    </div>

                 <div class="row">
                   <div class="col-md-3">

                      <div class="form-group has-feedback">
                        <label>Teléfono</label>
                        <br>
                        <input type="text"  value="<?php echo $escribano->telefono ?>" name="telefono" id="telefono" placeholder="teléfono">
                        </div>
                        </div>
                    </div>

                 <div class="row">
                   <div class="col-md-3">
                        <div class="form-group has-feedback">
                          <label >Dirección</label>
                          <br>
                          <input type="text" value="<?php echo $escribano->direccion ?>" name="direccion" id="direccion" placeholder="Dirección">
                         </div>
                         </div>
                    </div>

                 <div class="row">
                   <div class="col-md-3">
                        <div class="form-group has-feedback">
                          <label >e-mail</label>
                          <br>
                          <input type="text"  value="<?php echo $escribano->email ?>" name="email" id="email" placeholder="email">
                          </div>
                          <div>
                             <input type="hidden"  value="<?php echo $escribano->idEscribano ?>" name="idEscribano" id="idEscribano" placeholder="idEscribano">
                          </div>
                          </div>
                    </div>

                   <div class="row">
                     <div class="col-md-3">        
                 
                 <?php 
                 $id_prov=0;
                  ?>
                <div> 
                            <?php 
                            $provincias = $this->db->get("provincia")->result();
                                  $id_prov=0;
                                    ?>
                                 Provincia
                                      <select name="provincia" id="Provincia">
                                            <option value="">Selecciona una Provincia</option>
                                            <?php  foreach ($provincias as $p){ ?>
                                               <option value=
                                                <?php
                                               
                                                echo "' $p->idProvincia' > $p->nombre"; }?></option>
                                          

                                        </select>
                                          <div style="color:red;" ><p><?=form_error('provincia')?></p></div>
                                     </div>
                                     </div>
                    </div>

                                      <div class="row">
                                       <div class="col-md-3">
                                           <div>
                                           
                                           <br>

                                            Localidad
                                              <select name="localidad" id="Localidad">
                                                   <option value="">Selecciona una Localidad </option>
                                              </select>
                                                <div style="color:red;" ><p><?=form_error('localidad')?></p></div>
                                           </div>
                   </div>
                    </div>

              
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
              

          <?=form_close()?>
          </div>
        </div>
      </div>
</section>
</div>
<script type="text/javascript">
    if (document.getElementById("estado").value=="P") {
                          $("#estadoAprobacion")
                            .find("option:contains(P)")
                            .prop("selected", true);
                           
                      //
                    };
    if (document.getElementById("estado").value=="A") {
                          $("#estadoAprobacion")
                            .find("option:contains(A)")
                            .prop("selected", true);
                           
                      //
                    };
    if (document.getElementById("estado").value=="R") {
                          $("#estadoAprobacion")
                            .find("option:contains(R)")
                            .prop("selected", true);
                           
                      //
                    };
</script>