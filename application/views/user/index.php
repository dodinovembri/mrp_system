  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3><br><br>
               <a href="<?php echo base_url('admin/create_user') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</button></a>
              <br><br><?php if($this->session->flashdata('success')){ ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="icon fa fa-check"></i>  <?= $this->session->flashdata('success'); ?>              
                </div>              
              <?php } ?>               
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: scroll;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 0; foreach ($user as $key => $value) { $no++; ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $value->username ?></td>
                    <td><small class="label label-success"><?= $value->role_akses ?></small></td>
                    <td><?= $value->created_at ?></td>
                    <td>
                      <a href="<?php echo base_url('admin/detail_user/'. $value->id) ?>"><i class="fa  fa-search"></i></a> - 
                      <a href="<?php echo base_url('admin/edit_user/'. $value->id) ?>"><i class="fa fa-edit"></i></a> -                                                         
                      <a data-toggle="modal" data-target="#modal-danger-<?php echo $value->id ?>" href="javascript::"><i class="fa  fa-trash-o"></i></a>
                    </td>
                  </tr>

                  <div class="modal modal-danger fade" id="modal-danger-<?php echo $value->id ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Delete Data</h4>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure want to delete this record ?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                          <form method="post" action="<?php echo base_url('admin/delete_user/'. $value->id) ?>">
                          <button type="submit" class="btn btn-outline">Delete</button>                          
                          </form>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                <?php } ?>                               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->