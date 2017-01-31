<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Operador Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu Operador</li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Administrar Registraciones</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url().'index.php/c_loginop/reg_pen'?>"><i class="fa fa-circle-o"></i> Registraciones Pendientes</a></li>
          </ul>
        </li>   

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Administrar Minutas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Ver Minutas</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Aprobar Minutas</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Crear Usuarios</a></li>
          </ul>
        </li>

      
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Calendario</span>
          </a>
        </li>
       
        

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

