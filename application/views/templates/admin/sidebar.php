  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($this->uri->segment(2) == 'index') {echo 'active';} ?>">
          <a href="<?php echo base_url('admin/index') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="<?php if($this->uri->segment(2) == 'cust_order') {echo 'active';} ?>">
          <a href="<?php echo base_url('admin/cust_order') ?>">
            <i class="fa fa-reorder"></i>
            <span>Customers Order</span>            
          </a>         
        </li>
        <li class="<?php if($this->uri->segment(2) == 'supp_order') {echo 'active';} ?>">
          <a href="<?php echo base_url('admin/supp_order') ?>">
            <i class="fa fa-th-list"></i>
            <span>Suppliers Order</span>            
          </a>         
        </li>        
        <li class="header">MASTER DATA</li>      
        <li class="<?php if($this->uri->segment(2) == 'product') {echo 'active';} ?>">
          <a href="<?php echo base_url('admin/product') ?>">
            <i class="fa fa-gg-circle"></i>
            <span>Products</span>
          </a>
        </li>         
        <li class="<?php if($this->uri->segment(2) == 'komposisi') {echo 'active';} ?>">
          <a href="<?php echo base_url('admin/komposisi') ?>">
            <i class="fa fa-list-alt"></i>
            <span>Komposisi</span>      
          </a>
        </li>       
        <li class="header">SYSTEM CONFIGURATON</li>        
        <li class="<?php if($this->uri->segment(2) == 'user') {echo 'treeview active';} else {echo 'treeview';} ?>">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>System</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->segment(2) == 'user') {echo 'active';} ?>"><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-circle-o"></i> Users</a></li>
          </ul>
        </li>      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
