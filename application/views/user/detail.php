  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li><a href="<?php echo base_url('admin/user') ?>"> User</a></li>        
        <li class="active">Create User</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Detail User</h3><br><br>
              <?php if($this->session->flashdata('warning')){ ?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="icon fa fa-check"></i>  <?= $this->session->flashdata('warning'); ?>              
                </div>              
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" action="<?= base_url('admin/store_user') ?>">                              
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" value="<?php echo $user->username ?>" placeholder="Enter ..." readonly>
                </div>                
                <div class="form-group">
                  <label>Role Akses</label>
                  <input type="text" class="form-control" name="role" value="<?php echo $user->role_akses ?>" placeholder="Enter ..." readonly>
                </div>
                <br>                                                                                                                         

              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
  </div>
  <!-- /.content-wrapper -->    