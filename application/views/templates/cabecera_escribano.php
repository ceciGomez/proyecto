<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIRMI | Sistema de Registración de Minutas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.css">

   <style type="text/css">
                     .modal-header{
                        background-color:#222d32;
                          }
                          .modal-content {
                        overflow:hidden;
                          }
                            #parcelas {
       width:2500px;
      }
   </style>
    <!-- CSS para quitar las flechas de los input number -->
   <style type="text/css">
      .form-control{
      -moz-appearance:textfield;
        }

      .form-control::-webkit-outer-spin-button,
      .form-control::-webkit-inner-spin-button {
      -webkit-appearance: none !important;
     margin: 0;
    }
</style>
    <!-- Cambia el color del boton en el datatable de buscar personas -->
<style type="text/css">
.seleccionar
{
    background-color: #228b22;
}
.button:hover
{
    background-image: #228b22;
}
</style>

   <link rel="stylesheet" href="<?=base_url()?>assets/plugins/bootstrap-3.3.5/dist/css/bootstrap.css"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/ionicons.min.css"/>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css"/>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css"/>
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/iCheck/flat/blue.css"/>
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/morris/morris.css"/>
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css"/>
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datepicker/datepicker3.css"/>
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.css"/>
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"/>


    <script src="<?=base_url()?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>

    <link type="text/javascript" href="<?=base_url()?>assets/plugins/timepicker/bootstrap-timepicker.min.js" />

    <script src="<?=base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url().'index.php/c_escribano/'?>"  class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>irmi  </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIRMi</b>
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><?php echo count($notificaciones_si);?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"> <?php echo count($notificaciones_si);?> pedidos contestados</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                 
                  <li>
                     <?php if(count($notificaciones_si)>5 ){?>
                        <?=form_open(base_url().'index.php/c_escribano/buscar_si'); ?>
                            <?php 
                            echo" <button   value='ver' type='submit' style='background-color:white;border-style:  0.5px solid black;' />";
                          echo "<i class='glyphicon glyphicon-envelope text-blue'></i> ";
                         echo" Tiene ". count($notificaciones_si). " pedidos de información contestados";

                         ?>
                           <?=form_close()?>
                        <?php 
                          }
                        else
                        {
                          foreach ($notificaciones_si as $si) {?>
                          <?=form_open(base_url().'index.php/c_escribano/buscar_si'); ?>
                            <?php 
                             echo" <button  value='ver' style='background-color:white;border-style:  0.5px solid black;' type='submit' />";
                             echo "<input  type='hidden' name='idPedido' value='$si->idPedido'>";
                               echo "<i class='glyphicon glyphicon-envelope text-blue'></i> ";
                             echo" El pedido número $si->idPedido fue contestado";
  ?>
                             <?=form_close()?>
                             <?php 
                          }
                        }
                        ?>
                  </li>
          
                  <!-- end message -->
                </ul>
              </li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
           <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?php echo count($notificaciones_ma) +  count ($notificaciones_mr);?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tiene <?php echo count($notificaciones_ma)+  count ($notificaciones_mr);?> notificaciones</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
              
                  <li>
                  
                      <?php if(count($notificaciones_ma)>5 ){?>
                        <?=form_open(base_url().'index.php/c_escribano/buscar_min_a_x_id'); ?>
                            <?php 
                            echo" <button  value='ver' type='submit' style='background-color:white;border-style:  0.5px solid black;'/>";
                          echo "<i class='glyphicon glyphicon-list-alt text-green'></i> ";
                         echo" Tiene ". count($notificaciones_ma)." minutas aprobadas";
                           ?>
                           <?=form_close()?>
                        <?php 
                          }
                        
                        else
                        {
                          foreach ($notificaciones_ma as $ma) { ?>
                          <?=form_open(base_url().'index.php/c_escribano/buscar_min_a_x_id'); ?>
                            <?php 
                             echo" <button  value='ver' type='submit' style='background-color:white;border-style:  0.5px solid black;'' />";
                             echo "<input  type='hidden' name='idMinuta' value='$ma->idMinuta'>";

                             echo "<i class='glyphicon glyphicon-list-alt text-green'></i> ";
                             echo" La minuta $ma->idMinuta fue aprobada";
                           
                              ?>
                             <?=form_close()?>
                             <?php 
                          }
                        }
                        ?>
                      </li>

                       <?php if(count($notificaciones_mr)>5 ){?>
                        <?=form_open(base_url().'index.php/c_escribano/buscar_min_r_x_id'); ?>
                            <?php 
                            echo" <button  value='ver' type='submit' style='background-color:white;border-style:  0.5px solid black;'/>";
                          echo "<i class='glyphicon glyphicon-list-alt text-red'></i> ";
                         echo" Tiene ". count($notificaciones_mr)." minutas rechazadas";
                           ?>
                           <?=form_close()?>
                        <?php 
                          }
                        
                        else
                        {
                          foreach ($notificaciones_mr as $mr) { ?>
                          <?=form_open(base_url().'index.php/c_escribano/buscar_min_r_x_id'); ?>
                            <?php 
                             echo" <button  value='ver' type='submit' style='background-color:white;border-style:  0.5px solid black;'' />";
                             echo "<input  type='hidden' name='idMinuta' value='$mr->idMinuta'>";

                             echo "<i class='glyphicon glyphicon-list-alt text-red'></i> ";
                             echo" La minuta número $mr->idMinuta fue rechazada";
                           
                              ?>
                             <?=form_close()?>
                             <?php 
                          }
                        }
                        ?>
                              
                  </li>
          
                  <!-- end message -->
                </ul>
              </li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>assets/dist/img/<?php echo $this->session->userdata('foto'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">  <?php echo  $this->session->userdata('nomyap') ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <a href="<?=base_url()?>index.php/upload">
                <img src="<?=base_url()?>assets/dist/img/<?php echo $this->session->userdata('foto'); ?>" class="img-circle" alt="User Image" width="100" height="100" >
                </a>

                <p>
                  
                  <?php echo  $this->session->userdata('nomyap') ?>- <?php echo $this->session->userdata('perfil'); ?>
                  <small>Miembro desde <?php echo  $this->session->userdata('fechaReg') ?></small>
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=base_url().'index.php/c_escribano/verPerfil'?>" class="btn btn-default btn-flat">Perfil de usuario</a>
                </div>
                <div class="pull-right">
                <a class="btn btn-default btn-flat" href="<?=base_url().'index.php/c_login_escribano/logout_ci'?>" > Cerrar Sesión</a>
                 <!-- <a href="" class="btn btn-default btn-flat">Sign out</a> -->
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>