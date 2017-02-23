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
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="<?=base_url()?>index.php/c_administrador/actualizarOperador/<?php echo $operador[0]->idUsuario  ?>">
              <div class="box-body">
                <!--
                <div class="form-group">
                  <label for="exampleInputPassword1">id</label>
                  <input type="text" class="form-control" id="idUsuario" value="<?php echo $operador[0]->idUsuario ?>" placeholder="id" name="idUsuarioVisible" disabled="" >
                </div>
                
                 <div class="form-group">
                  <label for="exampleInputText1">id</label>
                  <input type="text" class="form-control" id="idUsuario" value="<?php echo $operador[0]->idUsuario ?>" placeholder="id" name="idUsuario" disabled="" >
                </div>-->
                
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
                 <select name="provincia" id="Provincia">
                 <option value="">Selecciona una Provincia</option>
                 <?php  foreach ($provincias as $p){ ?>
                 <option value=
                  <?php
                 
                  echo "' $p->idProvincia' > $p->nombre"; }?></option>
            
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
