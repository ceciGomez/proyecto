

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Crear Minuta
   </h1>
   <small>Registrar Parcela</small>
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
                  <form role="form">
                     <div class="box-body">
                        <div class="form-group">
                           <div class="form-group">
                              <div class="col-md-3">
                                 <label for="exampleInputEmail1">Circunscripción</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Circunscripción">
                              </div>
                              <div class="col-md-3">
                                 <label for="exampleInputEmail1">Sección</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Sección">
                              </div>
                              <div class="col-md-3">
                                 <label for="exampleInputEmail1">Chacra</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Chacra">
                              </div>
                              <div class="col-md-3">
                                 <label for="exampleInputEmail1">Quinta</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Quinta">
                              </div>
                              <div class="col-md-3">
                                 <label for="exampleInputEmail1">Fracción</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Fracción">
                              </div>
                              <div class="col-md-3">
                                 <label for="exampleInputEmail1">Manzana</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Manzana">
                              </div>
                              <div class="col-md-3">
                                 <label for="exampleInputEmail1">Parcela</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Parcela">
                              </div>
                              <div class="col-md-3">
                                 <label for="exampleInputEmail1">Superficie</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Superficie">
                              </div>
                              <div class="col-md-3">
                                 <label for="exampleInputEmail1">Partida</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Partida">
                              </div>
                              <div class="col-md-3">
                                 <label for="exampleInputEmail1">Plano Aprobado</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Plano Aprobado">
                              </div>
                              <div class="form-group col-md-3">
                                 <label>Fecha de Plano Aprobado</label>
                                 <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" class="form-control pull-right" name="fechaPA" id="fechaPA">
                                 </div>
                                 <!-- /.input group -->
                              </div>
                              <div class="form-group col-md-3">
                                 <label>Tipo de Propiedad</label>
                                 <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Urbano</option>
                                    <option>Urbano</option>
                                    <option>Rural</option>
                                 </select>
                              </div>
                              <div class="col-md-3">
                                 <label for="exampleInputEmail1">Tomo</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tomo">
                              </div>
                              <div class="col-md-3">
                                 <label for="exampleInputEmail1">Folio</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Folio">
                              </div>
                              <div class="col-md-3">
                                 <label for="exampleInputEmail1">Finca</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Finca">
                              </div>
                              <div class="col-md-3">
                                 <label for="exampleInputEmail1">Año</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Año">
                              </div>
                              <div class="col-md-3">
                                 <label>Provincia</label>
                                 <select name="Provincia"  id="Provincia" class="form-control select2" style="width: 100%;">
                                    <?php  foreach ($provincias as $value):?>
                                    <option value="<?php echo $value->idProvincia;?>">
                                       <?php 
                                          $idProv = $value->idProvincia; 
                                          echo $value->nombre; ?>          
                                    </option>
                                    <?php endforeach ?>
                                 </select>
                              </div>
                              <div class="col-md-3">
                                 <label>Departamento</label>
                                 <select name="Departamento" id="Departamento" class="form-control select2" style="width: 100%;">
                                    
                                    <option value="">
                                                
                                    </option>
                                    
                                 </select>
                              </div>
                              <div class="col-md-3">
                                 <label>Localidad</label>
                                 <select 
          <select name="Localidad" id="Localidad" class="form-control select2" style="width: 100%;">
                                    
                                    <option value="">
                                       <?php 
                                          echo $value->nombre; ?>          
                                    </option>
                                 </select>
                              </div>
                              <div class="col-md-3">
                                 <label for="exampleInputEmail1">Descripción de la Parcela</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Descripción de la Parcela">
                              </div>
                              <div class="col-md-3">
                                 <label for="exampleInputEmail1">Matrícula RPI</label>
                                 <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Matrícula RPI">
                              </div>
                              <div class="form-group col-md-3">
                                 <label>Fecha de Matricula:</label>
                                 <div class="input-group date">
                                    <div class="input-group-addon">
                                       <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="fechaM" id="fechaM">
                                 </div>
                                 <!-- /.input group -->
                              </div>
                              <div class="col-md-12">
                                 <div class="box-footer">
                                    <a class="btn btn-primary" href="<?=base_url().'index.php/c_escribano/registrarPropietario'?>" >Registrar Propietario</a>
                                    <a class="btn btn-primary" href="<?=base_url()?>index.php/c_loginescri" >Cancelar</a>
                                 </div>
                              </div>
                           </div>
                           <!-- /.box-body -->
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
       $('#fechaM').datepicker();
   });
    $( document ).ready(function() {
       $('#fechaPA').datepicker();
   });
   
</script>


  <script type="text/javascript">

/*funcion ajax que llena el combo dependiendo de la categoria seleccionada*/
$(document).ready(function(){
   $("#Provincia").change(function () {
           $("#Provincia option:selected").each(function () {
         
           //console.log( $('#Provincia').val());
           //pado el numero de pronvicia, es decir el id
            miprovincia=$('#Provincia').val();
            $.post("<?=base_url()?>/index.php/c_registro/datosDir", { miprovincia: miprovincia}, function(data){
            $("#Departamento").html(data);
            });            
        });
   })
});


$(document).ready(function(){
   $("#Departamento").change(function () {
           $("#Departamento option:selected").each(function () {
         
           //console.log( $('#Provincia').val());
           //pado el numero de pronvicia, es decir el id
            midepartamento=$('#Departamento').val();
            $.post("<?=base_url()?>/index.php/c_registro/datosDir", { midepartamento: midepartamento}, function(data){
            $("#Localidad").html(data);
            });            
        });
   })
});
/*fin de la funcion ajax que llena el combo dependiendo de la categoria seleccionada*/
</script>

