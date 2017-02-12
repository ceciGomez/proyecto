<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Editar Operador
   </h1>
   <small>Operador XXXY</small>
   <ol class="breadcrumb">
      <li><a href="<?=base_url()?>index.php/c_loginadmin>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Editar Operador</li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="<?=base_url()?>index.php/c_administrador/actualizarOperador/<?php echo $operador[0]->idUsuario  ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre y Apellido</label>
                  <input type="text" class="form-control" value="<?php echo $operador[0]->nomyap ?>" id="nomyap" placeholder="Nombre y Apellido">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">id</label>
                  <input type="text" class="form-control" id="idUsuario" value="<?php echo $operador[0]->idUsuario ?>" placeholder="id">
                </div>
               </div>
             

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
              </div>

            </form>
          </div>
        </div>
      </div>
</section>
</div>
