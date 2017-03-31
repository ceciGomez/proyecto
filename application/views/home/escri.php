<!-- Content Wrapper. Contains page content --><style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:hover{background-color:#f5f5f5}
</style>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
   <br>
   <ol class="breadcrumb">
      <li><a href="<?=base_url()?>index.php/c_loginescri"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Escribano</li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <!-- Main row -->
   
      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
               <h3 class="profile-username text-center">BIENVENIDO A SIRMI</h3>
              <img class="profile-user-img img-responsive img-circle" src="<?=base_url()?>assets/dist/img/<?php echo $this->session->userdata('foto'); ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $this->session->userdata('nomyap') ?></h3>

              <p class="text-muted text-center"><?php echo $this->session->userdata('perfil') ?></p>
              
            </div>
            <!-- /.box-body -->
             <table class="table" class="table-bordered" >
            <tbody>
              <tr>
          <th> Nombre y Apellido</th><td> <?php echo $escribano[0]->nomyap ?> </td>
        </tr>
        <tr>
          <th> Nombre de Usuario</th><td> <?php echo $escribano[0]->usuario ?></td>
        </tr>
        <tr>
          <th> Fecha de Registración</th><td> <?php echo $escribano[0]->fechaReg ?> </td>
        </tr>
        <tr>
          <th> DNI</th><td><?php echo $escribano[0]->dni ?> </td>
        </tr>
         <tr>
          <th> Dirección</th><td> <?php echo $escribano[0]->matricula ?> </td>
        </tr>
        <tr>
          <th> Teléfono</th><td> <?php echo $escribano[0]->telefono ?> </td>
        </tr>
       
        <tr>
          <th> Email</th><td> <?php echo $escribano[0]->email ?> </td>
        </tr>
        <tr>
         <tr>
          <th> Dirección</th><td> <?php echo $escribano[0]->direccion ?> </td>
        </tr>
          <th> Localidad</th><td> <?php echo $escribano[0]->nombreLocalidad?></td>
        </tr>
        <tr>
          <th> Perfil</th><td> Escribano </td>
        </tr>
        </tbody>
            </table>
          </div>
          <!-- /.box -->

         
          
        </div>
        <!-- /.col -->
    
        <!-- /.col -->
      </div>
      <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
