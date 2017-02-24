<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Editar Operador
   </h1>
 
   <ol class="breadcrumb">
      <li><a href="<?=base_url()?>index.php/c_loginadmin>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Editar Operador</li>
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
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            
           <?=form_open(base_url().'index.php/c_administrador/actualizarOperador')?>
                
                 <div class="form-group">
                  <label for="exampleInputEmail1">Nombre y Apellido</label>
                  <input type="text" class="form-control" value="<?php echo $operador[0]->nomyap ?>" name="nomyap" id="nomyap" placeholder="Nombre y Apellido">
                  </div>

                 <div class="form-group">
                  <label for="exampleInputEmail1">Usuario</label>
                  <input type="text" class="form-control" value="<?php echo $operador[0]->usuario ?>" name="usuario" id="usuario" placeholder="Usuario">
                 </div>

                  <div class="form-group">
                  <label for="exampleInputEmail1">Contraseña</label>
                  <input type="password" class="form-control" value="<?php echo $operador[0]->contraseña ?>" name="contraseña" id="contraseña" placeholder="Contraseña">
                  </div>

                  <div class="form-group">
                  <label for="exampleInputEmail1">DNI</label>
                  <input type="text" class="form-control" value="<?php echo $operador[0]->dni ?>" name="dni" id="dni" placeholder="dni">
                 </div>
                 
                 <div class="form-group">
                  <label for="exampleInputEmail1">Teléfono</label>
                  <input type="text" class="form-control" value="<?php echo $operador[0]->telefono ?>" name="telefono" id="telefono" placeholder="teléfono">
                  </div>

                  <div class="form-group">
                  <label for="exampleInputEmail1">Dirección</label>
                  <input type="text" class="form-control" value="<?php echo $operador[0]->direccion ?>" name="direccion" id="direccion" placeholder="Dirección">
                 </div>

                 <div class="form-group">
                  <label for="exampleInputEmail1">e-mail</label>
                  <input type="text" class="form-control" value="<?php echo $operador[0]->email ?>" name="email" id="email" placeholder="email">
                  </div>

                 <div> 
                 <?php 
                 $id_prov=0;
                  ?>
                  <label for="exampleInputEmail1">Provincia</label>
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
                                     <div>
                                     
                                     <br>

                                      Localidad
                                        <select name="localidad" id="Localidad">
                                             <option value="">Selecciona una Localidad </option>
                                        </select>
                                          <div style="color:red;" ><p><?=form_error('localidad')?></p></div>
                                     </div>
             

              
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
              

          <?=form_close()?>
          </div>
        </div>
      </div>
</section>
</div>
