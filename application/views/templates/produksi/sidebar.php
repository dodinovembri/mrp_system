  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($this->uri->segment(2) == 'index') {echo 'active';} ?>">
          <a href="<?php echo base_url('produksi/index') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="<?php if($this->uri->segment(2) == 'supp_order') {echo 'active';} ?>">
          <a href="<?php echo base_url('produksi/supp_order') ?>">
            <i class="fa fa-reorder"></i>
            <span>Customers Order</span>            
          </a>         
        </li>            
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
