

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h3 align="center">
        Editar  Minuta
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
                        <h3 class="box-title">Editar PH <?php echo $this->session->userdata('siguienteParcelaEditar'). " de un total de ". $this->session->userdata('cantidadParcelasEditar')?></h3>
                     </div>
                     <!-- /.box-header -->
                     <!-- form start -->
                      <?=form_open(base_url().'index.php/C_escribano/registrarEditarParcela')?>
                     <form method="post">
                        <div class="box-body">
                           <div class="form-group">                             
                                 <div class="col-md-3">
                                    <label for="circunscripcion">Circunscripción</label>
                                    <input type="text" class="form-control"  id="circunscripcion" name="circunscripcion" onkeyup="changeToUpperCase(this)" <?php echo "value='$circunscripcion'" ?> placeholder="Ejemplo: IV " onKeyDown="limitText(this,8);">
                                    <div style="color:red;" ><p><?=form_error('circunscripcion')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="seccion">Sección</label>
                                    <input type="text" class="form-control" id="seccion" name="seccion" <?php echo "value='$seccion'" ?> placeholder="Ejemplo: A" onkeyup="changeToUpperCase(this)" maxlength="1">
                                    <div style="color:red;" ><p><?=form_error('seccion')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="chacra">Chacra</label>
                                    <input type="number" class="form-control" min="0" onkeypress="return isNumberKey(event)" id="chacra" name="chacra" <?php echo "value='$chacra'" ?> placeholder="Ejemplo: 999" onKeyDown="limitText(this,4);">
                                    <div style="color:red;" ><p><?=form_error('chacra')?></p></div>
                                 </div>                             
                            
                                 <div class="col-md-3">
                                    <label for="quinta">Quinta</label>
                                    <input type="number" class="form-control" min="0" onkeypress="return isNumberKey(event)" id="quinta" name="quinta" <?php echo "value='$quinta'" ?> placeholder="Ejemplo: 999" onKeyDown="limitText(this,4);">
                                    <div style="color:red;" ><p><?=form_error('quinta')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="fraccion">Fracción</label>
                                    <input type="text" class="form-control" id="fraccion" name="fraccion" onkeyup="changeToUpperCase(this)"  onKeyDown="limitText(this,8);"<?php echo "value='$fraccion'" ?> placeholder="Ejemplo: 99999999" >
                                    <div style="color:red;" ><p><?=form_error('fraccion')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="manzana">Manzana</label>
                                    <input type="text" class="form-control" id="manzana" name="manzana" onKeyDown="limitText(this,5);" onkeyup="changeToUpperCase(this)" <?php echo "value='$manzana'" ?> placeholder="Ejemplo: 66554">
                                    <div style="color:red;" ><p><?=form_error('manzana')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="parcela">Parcela</label>
                                    <input type="text" class="form-control" id="parcela" name="parcela"  maxlength="6" onkeyup="changeToUpperCase(this)" <?php echo "value='$parcela'" ?> placeholder="Ejemlo:123456">
                                    <div style="color:red;" ><p><?=form_error('parcela')?></p></div>
                                 </div>                              
                              
                                 <div class="col-md-3">
                                    <label for="superficie">Superficie</label>
                                    <input type="text" class="form-control" id="superficie"  maxlength="10"  name="superficie" <?php echo "value='$superficie'" ?>  onkeypress="return isNumberKey(event)" placeholder="Ejemplo: 2500000000">
                                    <div style="color:red;" ><p><?=form_error('superficie')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="partida">Partida</label>
                                    <input type="text" class="form-control" id="partida" min="0" <?php echo "value='$partida'" ?>  onkeypress="return isNumberKey(event)" name="partida" placeholder="Ejemplo: 999999" onKeyDown="limitText(this,6);">
                                    <div style="color:red;" ><p><?=form_error('partida')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="planoAprobado">Plano Aprobado</label>
                                    <input type="text" class="form-control"  maxlength="10" id="planoAprobado" name="planoAprobado" <?php echo "value='$planoAprobado'" ?> placeholder="22/222/22">
                                    <div style="color:red;" ><p><?=form_error('planoAprobado')?></p></div>
                                 </div>
                                  <div class=" col-md-3">
                                    <label>Fecha de Plano Aprobado</label>
                                    <div class="input-group date">

                                       <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                       <input type="text" class="form-control pull-right" name="fechaPlanoAprobado" placeholder="dd/mm/aaaa" <?php echo "value='$fechaPlanoAprobado'" ?> id="fechaPlanoAprobado">                                       

                                    </div>
                                    <div style="color:red;" ><p><?=form_error('fechaPlanoAprobado')?></p></div>
                                    <!-- /.input group -->
                                 </div>
                                 <div class="col-md-3">
                                    <label>Tipo de Propiedad</label>
                                    <select class="form-control select2" name="tipoPropiedad" <?php echo "value='$tipoPropiedad'" ?> style="width: 100%;">
                                       <option value="">Tipo propiedad</option>
                                       <option value="U" <?php echo set_select('add_fields_type','input', ( !empty($tipoPropiedad) && $tipoPropiedad == "U" ? TRUE : FALSE )); ?>>Urbano</option>
                                       <option value="R" <?php echo set_select('add_fields_type','input', ( !empty($tipoPropiedad) && $tipoPropiedad == "R" ? TRUE : FALSE )); ?>>Rural</option>
                                       <option value="S" <?php echo set_select('add_fields_type','input', ( !empty($tipoPropiedad) && $tipoPropiedad == "S" ? TRUE : FALSE )); ?>>SubUrbano</option>
                                    </select>
                                    <div style="color:red;" ><p><?=form_error('tipoPropiedad')?></p></div>
                                 </div>
                             
                                 <div class="col-md-3">
                                    <label for="tomo">Tomo</label>
                                    <input type="number" class="form-control" min="0" onkeypress="return isNumberKey(event)" id="tomo" name="tomo" <?php echo "value='$tomo'" ?> placeholder="Ejemplo: 87124" onKeyDown="limitText(this,5);">
                                    <div style="color:red;" ><p><?=form_error('tomo')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="folio">Folio</label>
                                    <input type="number" class="form-control" min="0" onkeypress="return isNumberKey(event)" id="folio" name="folio" <?php echo "value='$folio'" ?> placeholder="Ejemplo:89126" onKeyDown="limitText(this,5);">
                                    <div style="color:red;" ><p><?=form_error('folio')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="exampleInputEmail1">Finca</label>
                                    <input type="number" class="form-control" min="0" onkeypress="return isNumberKey(event)" id="exampleInputEmail1" name="finca" <?php echo "value='$finca'" ?> placeholder="Ejemplo: 72622" onKeyDown="limitText(this,5);">
                                    <div style="color:red;" ><p><?=form_error('finca')?></p></div>
                                 </div>
                                 <div class="col-md-3">
                                    <label for="año">Año</label>
                                    <input type="number" class="form-control" id="año" min="0" onkeypress="return isNumber(event)" name="año" <?php echo "value='$año'" ?> placeholder="Ejemplo: 2017">
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
                                    <label for="nroMatriculaRPI">Matrícula RPI</label>
                                    <input type="text" class="form-control" min="0" onkeypress="return isNumberKey(event)" id="nroMatriculaRPI"  maxlength="8" name="nroMatriculaRPI" <?php echo "value='$nroMatriculaRPI'" ?> placeholder=" Ejemplo: 18282888">
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
                               <input type="hidden" value= '<?php echo $localidades  ?>' id="localidadPost">
                              <input type="hidden" value= '<?php echo $departamentos ?>' id="departamentoPost">

                              <div class="col-md-12">
                              <div class="box-footer">
                                  <button type="submit" class="btn btn-primary" >Editar PH</button>
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
   </section>
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


   //PARA QUE BUSQUE APENAS CARGA
    localidadPost=document.getElementById("localidadPost").value ;
     departamentoPost=document.getElementById("departamentoPost").value;
  $("#departamentos option[value="+ departamentoPost +"]").attr("selected",true);
  $("#localidades option[value="+localidadPost +"]").attr("selected",true);
       
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
             $("#localidades").empty();
             $("#localidades").append("<option>Seleccione localidad</option>");
            var json = $.parseJSON(response);
              $(json).each(function(i,val){             
                 $("#localidades").append("<option value='"+val.idLocalidad+"'>"+val.nombre+"</option");  
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
                 $("#localidades").append("<option value='"+val.idLocalidad+"'>"+val.nombre+"</option");  
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


