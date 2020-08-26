  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('kepala_gudang/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">Order List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Order to Supplier</h3>
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
                  <th>Order ID</th>
                  <th>Nama Supplier</th>
                  <th>Product</th>
                  <th>Jumlah</th>
                  <th>Status</th>
                  <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 0; foreach ($supp_order as $key => $value) { $no++; ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><b>SUPP-ORDER-00<?= $value->id ?></b></td>
                    <td><?= $value->supplier_name ?></td>
                    <td><?= $value->komposisi_name ?></td>
                    <td><?= $value->jumlah ?></td>
                    <td>
                      <?php if ($value->status == 0) { ?>
                        <small class="label label-danger"><i class="fa fa-clock-o"></i> Need to Order</small> 
                      <?php } elseif ($value->status == 1) { ?>
                        <small class="label label-info"><i class="fa fa-clock-o"></i> Already Ordered</small> 
                      <?php }else{ ?>
                        <small class="label label-info"><i class="fa fa-clock-o"></i> Completed</small> 
                      <?php } ?>
                    </td>
                    <td><?= $value->created_at ?></td>
                  </tr>                  
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