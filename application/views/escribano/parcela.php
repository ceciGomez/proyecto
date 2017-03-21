

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h3 align="center">
         Crear Minuta
      </h3>
      <ol class="breadcrumb">
         <li><a href="<?=base_url()?>index.php/c_loginescri"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Minuta</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
   <!-- Main row -->
   <div class="row">
      <!-- Left col -->
      <section class="col-lg-12 connectedSortable">
         <section class="content">
            <div class="row">
               <!-- left column -->
               <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                     <div class="box-header with-border">
                        <h3 class="box-title">Registrar Parcela</h3>
                     </div>
                     <!-- /.box-header -->
                     <!-- form start -->
                      <?=form_open(base_url().'index.php/C_escribano/registro_parcela')?>
                     <form method="post">
                        <div class="box-body">
                           <div class="form-group">                             
                                 <div class="col-md-3">
                                    <label for="exampleInputEmail1">Circunscripción</label>
                                    <input type="number" class="form-control"  id="exampleInputEmail1" name="circunscripcion" <?php echo "value='$circunscripcion'" ?> placeholder="Circunscripción" onKeyDown="limitText(this,8);">
                                    <div style="color:red;" ><p><?=form_error('circunscripcion')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputEmail1">Sección</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="seccion" <?php echo "value='$seccion'" ?> placeholder="A o C" onkeyup="changeToUpperCase(this)" maxlength="1">
                                    <div style="color:red;" ><p><?=form_error('seccion')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputEmail1">Chacra</label>
                                    <input type="number" class="form-control" min="0" onkeypress="return isNumberKey(event)" id="exampleInputEmail1" name="chacra" <?php echo "value='$chacra'" ?> placeholder="Entero" onKeyDown="limitText(this,8);">
                                    <div style="color:red;" ><p><?=form_error('chacra')?></p></div>
                                 </div>                             
                            
                                 <div class="col-md-3">
                                    <label for="exampleInputEmail1">Quinta</label>
                                    <input type="number" class="form-control" min="0" onkeypress="return isNumberKey(event)" id="exampleInputEmail1" name="quinta" <?php echo "value='$quinta'" ?> placeholder="Entero" onKeyDown="limitText(this,8);">
                                    <div style="color:red;" ><p><?=form_error('quinta')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputEmail1">Fracción</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="fraccion" onkeyup="changeToUpperCase(this)" <?php echo "value='$fraccion'" ?> placeholder="Fracción" >
                                    <div style="color:red;" ><p><?=form_error('fraccion')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputEmail1">Manzana</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="manzana" onkeyup="changeToUpperCase(this)" <?php echo "value='$manzana'" ?> placeholder="Entero">
                                    <div style="color:red;" ><p><?=form_error('manzana')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputEmail1">Parcela</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="parcela" onkeyup="changeToUpperCase(this)" <?php echo "value='$parcela'" ?> placeholder="entero">
                                    <div style="color:red;" ><p><?=form_error('parcela')?></p></div>
                                 </div>                              
                              
                                 <div class="col-md-3">
                                    <label for="exampleInputEmail1">Superficie</label>
                                    <input type="text" class="form-control" id="superficie" name="superficie" <?php echo "value='$parcela'" ?>  onkeypress="return isNumberKey(event)" placeholder="Ej: 25.000">
                                    <div style="color:red;" ><p><?=form_error('superficie')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputEmail1">Partida</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" min="0" <?php echo "value='$partida'" ?>  onkeypress="return isNumberKey(event)" name="partida" placeholder="Entero" onKeyDown="limitText(this,8);">
                                    <div style="color:red;" ><p><?=form_error('partida')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputEmail1">Plano Aprobado</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="planoAprobado" <?php echo "value='$planoAprobado'" ?> placeholder="22/222/22 - 22/222/RE">
                                    <div style="color:red;" ><p><?=form_error('planoAprobado')?></p></div>
                                 </div>
                                  <div class=" col-md-3">
                                    <label>Fecha de Plano Aprobado</label>
                                    <div class="input-group date">
<<<<<<< HEAD
                                       <div class="input-group-addon">
                                         <i class="fa fa-calendar"></i>
                                       </div>
                                       <input type="text" class="form-control pull-right" name="fechaPlanoAprobado" <?php echo "value='$fechaPlanoAprobado'" ?> id="fechaPlanoAprobado">                                       
=======
                                       <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                       <input type="text" class="form-control pull-right" name="fechaPlanoAprobado" placeholder="dd/mm/aaaa" <?php echo "value='$fechaPlanoAprobado'" ?> id="fechaPlanoAprobado">                                       
>>>>>>> refs/remotes/ceciGomez/master
                                    </div>
                                    <div style="color:red;" ><p><?=form_error('fechaPlanoAprobado')?></p></div>
                                    <!-- /.input group -->
                                 </div>
                                 <div class="col-md-3">
                                    <label>Tipo de Propiedad</label>
                                    <select class="form-control select2" name="tipoPropiedad" <?php echo "value='$tipoPropiedad'" ?> style="width: 100%;">
                                       <option value="">Tipo propiedad</option>
                                       <option value="Urbano" <?php echo set_select('add_fields_type','input', ( !empty($tipoPropiedad) && $tipoPropiedad == "Urbano" ? TRUE : FALSE )); ?>>Urbano</option>
                                       <option value="Rural" <?php echo set_select('add_fields_type','input', ( !empty($tipoPropiedad) && $tipoPropiedad == "Rural" ? TRUE : FALSE )); ?>>Rural</option>
                                    </select>
                                    <div style="color:red;" ><p><?=form_error('tipoPropiedad')?></p></div>
                                 </div>
                             
                                 <div class="col-md-3">
                                    <label for="exampleInputEmail1">Tomo</label>
                                    <input type="number" class="form-control" min="0" onkeypress="return isNumberKey(event)" id="exampleInputEmail1" name="tomo" <?php echo "value='$tomo'" ?> placeholder="Entero" onKeyDown="limitText(this,8);">
                                    <div style="color:red;" ><p><?=form_error('tomo')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputEmail1">Folio</label>
                                    <input type="number" class="form-control" min="0" onkeypress="return isNumberKey(event)" id="exampleInputEmail1" name="folio" <?php echo "value='$folio'" ?> placeholder="Entero" onKeyDown="limitText(this,8);">
                                    <div style="color:red;" ><p><?=form_error('folio')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputEmail1">Finca</label>
                                    <input type="number" class="form-control" mmin="0" onkeypress="return isNumberKey(event)" id="exampleInputEmail1" name="finca" <?php echo "value='$finca'" ?> placeholder="Entero" onKeyDown="limitText(this,8);">
                                    <div style="color:red;" ><p><?=form_error('finca')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputEmail1">Año</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" min="0" onkeypress="return isNumber(event)" name="año" <?php echo "value='$año'" ?> placeholder="aaaa">
                                    <div style="color:red;" ><p><?=form_error('año')?></p></div>
                                 </div>                              
                                  <div class="col-md-3">
                                    <label>Departamento</label>
                                    <select class="form-control select2 departamentos" id="departamentos"  name="departamentos" style="width: 100%;">
                                       <option value="" selected="">Selecciona departamento</option>
                                          <?php foreach($arraydepartamentos as $each){ ?>
                                        <option value="<?php echo $each->idDepartamento; ?>"<?php if($departamentos==$each->nombre) echo 'selected="selected"'; ?>><?php echo $each->nombre; ?></option>
                                          <?php } ?>
                                     </select>
                                     <div style="color:red;" ><p><?=form_error('departamentos')?></p></div>                                  
                                 </div>                      
                                 <div class="col-md-3">
                                    <label>Localidad</label>
                                    <select class="form-control select2 localidades" id="localidades" name="localidades" style="width: 100%;">   
                                     <option value="">Seleccione localidad</option>  
                                    </select>
                                     <div style="color:red;" ><p><?=form_error('localidad')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputEmail1">Descripción de la Parcela</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="descripcion" <?php echo "value='$descripcion'" ?> placeholder="Descripción de la Parcela">
                                    <div style="color:red;" ><p><?=form_error('descripcion')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputEmail1">Matrícula RPI</label>
                                    <input type="text" class="form-control" min="0" onkeypress="return isNumberKey(event)" id="exampleInputEmail1" name="nroMatriculaRPI" <?php echo "value='$nroMatriculaRPI'" ?> placeholder="Entero">
                                    <div style="color:red;" ><p><?=form_error('nroMatriculaRPI')?></p></div>
                                 </div>
                                 <div class="form-group col-md-3">
                                    <label>Fecha de Matricula:</label>
                                    <div class="input-group date">
                                       <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                       </div>
                                       <input type="text" class="form-control pull-right" placeholder="dd/mm/aaaa" name="fechaMatriculaRPI" <?php echo "value='$fechaMatriculaRPI'" ?> id="fechaMatriculaRPI">
                                    </div>
                                    <div style="color:red;" ><p><?=form_error('fechaMatriculaRPI')?></p></div>
                                    <!-- /.input group -->
                                 </div>
                              <div class="col-md-12">
                              <div class="box-footer">
                                  <button type="submit" class="btn btn-primary" >Registrar Propietario</button>
                                   <a class="btn btn-primary" href="<?=base_url()?>index.php/c_escribano/verMinutas" >Cancelar</a>
                                
                              </div>
                              </div>
                           
                           <!-- /.box-body -->
                        </div>
                       </div> 
                     </form>
                  </div>
                  <!-- /.box-body -->
               </div>
               <!-- /.box -->
            </div>
            <!--/.col (left) -->
            <!-- /.row -->
         </section>
      </section>
   </div>
</div>
<!-- /.content-wrapper -->


   <script>
        $( document ).ready(function() {
            $('#fechaMatriculaRPI').datepicker();
        });
         $( document ).ready(function() {
            $('#fechaPlanoAprobado').datepicker();
        });

    </script>
    <script language="javascript" type="text/javascript">
    function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
      }
    }
   </script>
      <!-- Cambia la letra ingresada a mayuscula-->
   <script >
    function changeToUpperCase(el)
       {
     el.value =el.value.trim().toUpperCase();
       }
   </script>
   <script type="text/javascript">
      function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode;
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
      }
   </script>
   <!-- Llena lista de localidades dependiendo del departamento seleccionado -->
   <script>
   $(document).ready(function(){

           console.log($('#departamentos').val());
   if($('#departamentos').val()!=""){
    localidadOnReady($('#departamentos').val());}
    });
   $("#departamentos").on("change",function(){
        localidad($('#departamentos').val());
   })
   function localidad(iddepartamento) {
             console.log($('#departamentos').val());  
      $.ajax({
         type:'POST',
         datatype:'json',
         data:{id_departamento: iddepartamento},
         url:"<?php echo base_url('index.php/C_escribano/cargarLocalidades');?>",
         success:function(response){  
         console.log($('#localidades').val());   
             $("#localidades").empty();
             $("#localidades").append("<option>Seleccione localidad</option>");
            var json = $.parseJSON(response);
              $(json).each(function(i,val){             
                 $("#localidades").append("<option>"+val.nombre+"</option");  
             });           
   
       }
      })
    }
     function localidadOnReady(iddepartamento) { 
      $.ajax({
         type:'POST',
         datatype:'json',
         data:{id_departamento: iddepartamento},
         url:"<?php echo base_url('index.php/C_escribano/cargarLocalidades');?>",
         success:function(response){  
         console.log( <?php echo json_encode($localidades); ?>); 
              $("#localidades").empty();
              $("#localidades").append("<option>Seleccione localidad</option>");
             var json = $.parseJSON(response);
              $(json).each(function(i,val){             
                 $("#localidades").append("<option>"+val.nombre+"</option");  
             });  
              $("#localidades").val( <?php echo json_encode($localidades); ?>);                 
           
         }
        })
      }
   
   </script>
      <!-- controla el ingreso de numero flotante -->
   <script type="text/javascript">
     function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode == 46){
        var inputValue = $("#superficie").val();
        var count = (inputValue.match(/'.'/g) || []).length;
        if(count<1){
            if (inputValue.indexOf('.') < 1){
                return true;
            }
            return false;
        }else{
            return false;
        }
    }
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
    }
    return true;
   }
   </script>
   <script>
    function isNumber(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
    }
     </script>


