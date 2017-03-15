<!-- Content Wrapper. Contains page content -->
<style type="text/css">
 
</style>
<div class="content-wrapper">
<!-- Content Header (Page header) -->

<!-- Main content -->
<script type="text/javascript">
//funcion que solo permite numeros
 function NumbersOnly(e) {
    var unicode = e.charCode ? e.charCode : e.keyCode;
    if (unicode != 8) {
        if (unicode < 48 || unicode > 57) {

            if (unicode == 9 || IsArrows(e) )
                return true;
            else
                return false;
        }
    }
}
function IsArrows (e) {
       return (e.keyCode >= 37 && e.keyCode <= 40); 
}
//funcion que solo permite letras
function validar(e) { 
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==8) return true; 
patron =/[A-Za-z\s]/; 
te = String.fromCharCode(tecla); 
return patron.test(te); 
}

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


            <div class="modal" id="Editar">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                 <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h3 class="modal-title" style="color:white" >Edición Escribano</h3>
                                 </div>
                                 <div class="modal-body">
                                         <?php if( $exito ==TRUE) { ?>
                                          <div><img src="<?=base_url().'images/exito.png'?>" width='40px' height="40px" > <h3> El operador se editó exitosamente.</h3></div>
                                           <?php } else{ ?>
                                           <div> <img src="<?=base_url().'images/error.png'?>" width='40px' height="40px" > <label><h3>El operador no se pudo editar, compruebe que los campos de edición sean correctos.</h3></label></div>

                                           <?php } ?>

                                     </div>

                                 <div class="modal-footer">
                                  <a href="" class="btn btn-default" data-dismiss="modal">Cerrar</a>
                                   <?php if($exito==TRUE){

                                     ?>
                                    <a href="<?=base_url().'index.php/c_administrador/gestionarOperadores'?>" class="btn btn-primary" >Aceptar</a>
                                    <?php } ?>
                                 </div>
                              </div>
                            </div>
                  </div>



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
                              <input type='text' name="nomyap" id="nomyap" placeholder="Nombre y Apellido" value='<?php echo $operador->nomyap; ?>'  style="text-transform:uppercase;" onkeypress="return validar(event)" onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </div>

                            <div class="col-md-3">
                               <label>Usuario :</label><br>
                               <input type="text"  value="<?php echo $operador->usuario ?>" name="usuario" id="usuario" placeholder="Usuario">
                            </div>
                             
                         

                          <div class="col-md-3">
                             <label>DNI :</label><br>
                              <input type="text" value="<?php echo $operador->dni ?>" name="dni" id="dni" placeholder="DNI" maxlength="8" onkeypress="return NumbersOnly(event);">
                          </div>


                         
 
                          <div class="col-md-3">
                              <label>Email :</label><br>
                             <input type="text"  value="<?php echo $operador->email ?>" name="email" id="email" placeholder="email">
                          </div>



                          <div class="col-md-3">
                            <label>Telefono :</label><br>
                            <input type="text" maxlength="15"   placeholder="+54" value="<?php echo $operador->telefono ?>" name="telefono" id="telefono" placeholder="teléfono" onkeypress="return NumbersOnly(event);">
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
                                       
                                 
                                 

                        

                          <div class="col-md-3">
                              <label>Dirección :</label><br>
                              <input type="text" value="<?php echo $operador->direccion ?>" name="direccion" id="direccion" placeholder="Dirección">
                          </div>
                          
                            
                          </div>
                          <div class="row">
                          <div class="col-md-3">
                                       <label>Baja de Usuario</label> <br>
                                             <input type="hidden"  value="<?php echo $operador->baja; ?>" name="estadoBaja" id="estadoBaja" >
                                              <select name="baja" id="baja">
                                                   <option value="1">Si </option>
                                                    <option value="0">No </option>
                                              </select>
                                            
                                           </div>
                           </div>
                        <br>
                                <input type="hidden"  value="<?php echo $operador->idUsuario ?>" name="idUsuario" id="idUsuario" >
                                 
                                <div align="center">
                                 <button type="submit" data-toggle="modal" class="btn btn-primary">Guardar Cambios</button>
                                 <a   class="btn btn-default" style="text-decoration: none;" href="<?=base_url().'index.php/c_administrador/gestionarOperadores'?>" > Cancelar</a>
                                   
                                

                                 </div>

                                 <div align="center" style="color:red;" ><p><?=form_error('nomyap')?></p></div> 
                                 <div align="center" style="color:red;" >  <p><?=form_error('dni')?></p></div>
                                 <div align="center" style="color:red;" ><p><?=form_error('email')?></p></div>
                                 <div align="center" style="color:red;" > <p><?=form_error('telefono')?></p></div>
                                 <div align="center" style="color:red;" ><p><?=form_error('provincia')?></p></div>
                                 <div align="center" style="color:red;" ><p><?=form_error('localidad')?></p></div>
                                 <div align="center" style="color:red;" ><p><?=form_error('usuario')?></p></div>
                                 <div align="center" style="color:red;" > <p><?=form_error('contraseña')?></p></div>


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