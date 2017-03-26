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
          <th> Nombre y Apellido</th><td> <?php echo $escribano->nomyap ?> </td>
        </tr>
        <tr>
          <th> Nombre de Usuario</th><td> <?php echo $escribano->usuario ?></td>
        </tr>
        <tr>
          <th> Fecha de Registración</th><td> <?php echo $escribano->fechaReg ?> </td>
        </tr>
        <tr>
          <th> DNI</th><td><?php echo $escribano->dni ?> </td>
        </tr>
         <tr>
          <th> Dirección</th><td> <?php echo $escribano->matricula ?> </td>
        </tr>
        <tr>
          <th> Teléfono</th><td> <?php echo $escribano->telefono ?> </td>
        </tr>
       
        <tr>
          <th> Email</th><td> <?php echo $escribano->email ?> </td>
        </tr>
        <tr>
         <tr>
          <th> Dirección</th><td> <?php echo $escribano->direccion ?> </td>
        </tr>
          <th> Localidad</th><td> <?php
            if($escribano->idLocalidad==null){echo "";}else{ $localidad=$this->db->get_where('localidad', array('idLocalidad'=>$escribano->idLocalidad))->row(); echo $localidad->nombre ;}?></td>
        </tr>
        <tr>
          <th> Perfil</th><td> Operador </td>
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
