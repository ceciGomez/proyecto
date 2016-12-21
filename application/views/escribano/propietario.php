

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Crear Minuta
      </h1>
      <small>Registrar Propietario</small>
      <ol class="breadcrumb">
         <li><a href="<?=base_url()?>index.php/c_loginescri"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?=base_url().'index.php/c_escribano/CrearMinuta'?>"></i> Parcela</a></li>
         <li class="active">Propietario</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content-body">
      <div class="box box-default">
         <div class="box-header with-border">
            <h3 class="box-title">Registrar Propietario</h3>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="row">
                  <div class="form-group">
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Apellido</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Apellido">
                        <!-- /.form-group -->
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Nombres</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombres">
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">DNI</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="DNI">
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">CUIT</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="CUIT">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Conyuge</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Conyuge">
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Dirección</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Dirección">
                     </div>
                     <div class="col-md-3">
                        <label>Localidad</label>
                        <select class="form-control select2"  style="width: 100%;">
                           <option selected="selected">Laguna Blanca</option>
                           <option>Resistencia</option>
                           <option>Tres Isletas</option>
                           <option>Las Palmas</option>
                           <option>Taco Pozo</option>
                           <option>Saenz Peña</option>
                           <option>La Escondida</option>
                        </select>
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Fecha de Escritura</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Fecha de Escritura">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Porcentaje de Condominio</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Porcentaje de Condominio">
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Numero de UC/UF</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Numero de UC/UF">
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Plano Aprobado de la UF/UC</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Plano Aprobado de la UF/UC">
                     </div>
                      <!-- Date -->
                      <div class="col-md-3">
              <div class="form-group">
                <label>Fecha de Aprobacion</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="fecha">
                </div>
                 </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
                  </div>
                  <div class="form-group">
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Porcentaje de UF/UC</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Porcentaje de UF/UC">
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Poligonos</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Poligonos">
                     </div>
                  </div>
                  <!-- /.form-group -->
               </div>
               <!-- /.col -->
               <!-- /.col -->
            </div>
            <div class="box-footer">
             <a class="btn btn-primary" href="<?=base_url().'index.php/c_escribano/registrarPropietario'?>" >Guardar y Registrar Otro Propietario</a>
              <a class="btn btn-primary" href="<?=base_url().'index.php/c_escribano/CrearMinuta'?>" >Registrar Otra Parcela</a>
               <a class="btn btn-primary" href="<?=base_url().'index.php/c_escribano/registrarMinuta'?>" >Finalizar Minuta</a>
            </div>
            <!-- /.row -->
         </div>
      </div>
      <!-- /.box -->
   </section>
</div>
<!-- /.content-wrapper -->

   <script>
        $( document ).ready(function() {
            $('#fecha').datepicker();
        });
    </script>