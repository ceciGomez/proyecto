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
      <li><a  href="<?=base_url()?>index.php/c_administrador"><i class="fa fa-dashboard"></i> Home</a></li>
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
   });

   //Para seleccionar la provincia y localidad que tiene el escribano

      idLocalidad=document.getElementById("idLocalidad").value;
       console.log(idLocalidad);
       $.post("<?=base_url()?>index.php/c_administrador/obtenerProvincia_x_idLoc",{idLocalidad:idLocalidad}, function(data){
            //seleccciona la provincia de la localidad
             document.getElementById("Provincia").selectedIndex=data;
             //cargo todas las localidades
              miprovincia=$('#Provincia').val();
             $.post("<?=base_url()?>index.php/c_administrador/mostrarLocalidad", { miprovincia: miprovincia}, function(data){
                  $("#Localidad").html(data);
                  //selecciono la localidad del escribano
                 document.getElementById("Localidad").selectedIndex=idLocalidad-1;

                  });
        });
});
</script>

<section class="content">

      <div class="row">
      <h3  align="center">Editar Operador</h3>

        <!-- left column -->
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-primary" >
          <div class="box-body" style="background-color: lightblue;">
                    <div class="form-group">    
                      <?=form_open(base_url().'index.php/c_administrador/actualizarOperador')?>
                         <div class="row">
                         
                            <div class="col-md-3">
                               <label>Nombre y Apellido:</label><br>
                              <input type='text' name="nomyap" id="nomyap" placeholder="Nombre y Apellido" value='<?php echo $operador->nomyap; ?>'  >
                            </div>

                            <div class="col-md-3">
                               <label>Usuario :</label><br>
                               <input type="text"  value="<?php echo $operador->usuario ?>" name="usuario" id="usuario" placeholder="Usuario">
                            </div>
                             <div class="col-md-3">
                               <label>Contraseña :</label><br>
                              <input type="password"  value="" name="contraseña" id="contraseña" placeholder="Contraseña">
                            </div>
                         

                          <div class="col-md-3">
                             <label>DNI :</label><br>
                              <input type="text" value="<?php echo $operador->dni ?>" name="dni" id="dni" placeholder="DNI">
                          </div>


                         
 
                          <div class="col-md-3">
                              <label>Email :</label><br>
                             <input type="text"  value="<?php echo $operador->email ?>" name="email" id="email" placeholder="email">
                          </div>



                          <div class="col-md-3">
                            <label>Telefono :</label><br>
                            <input type="text"  value="<?php echo $operador->telefono ?>" name="telefono" id="telefono" placeholder="teléfono">
                          </div>
                        
                          <div class="col-md-3">
                            <?php 
                            $provincias = $this->db->get("provincia")->result();
                                  $id_prov=0;
                                    ?>
                                 <label>Provincia</label><br>
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
                                           
                                          
                                           <label>Localidad</label> <br>
                                             <input type="hidden"  value="<?php echo $operador->idLocalidad; ?>" name="idLocalidad" id="idLocalidad" >
                                              <select name="localidad" id="Localidad">
                                                   <option value="">Selecciona una Localidad </option>
                                              </select>
                                                <div style="color:red;" ><p><?=form_error('localidad')?></p></div>
                                           </div>
                                       
                                  </div>
                                 

                         <div class="row">

                          <div class="col-md-3">
                              <label>Dirección :</label><br>
                              <input type="text" value="<?php echo $operador->direccion ?>" name="direccion" id="direccion" placeholder="Dirección">
                          </div>
                        <br>
                                     <input type="hidden"  value="<?php echo $operador->idUsuario ?>" name="idUsuario" id="idUsuario" >
                                 <br><br>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>

                                            <?=form_close()?>

                    
                  
                       </div>
                  </div>      

          </div>
        </div>
      </div>
</section>
</div>

                   
               

</script>