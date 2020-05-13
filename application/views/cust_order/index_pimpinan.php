  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('pimpinan/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">Customer Order</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Customer Order List</h3>
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
                  <th>Nama Customer</th>
                  <th>Product</th>
                  <th>Jumlah</th>    
                  <th>Satuan</th>
                  <th>Price</th>                                 
                  <th>Created At</th>                  
                </tr>
                </thead>
                <tbody>
                <?php $no = 0; foreach ($cust_order as $key => $value) { $no++; ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><b>ORDER-00<?= $value->id ?></b></td>
                    <td><?= $value->cust_name ?></td>
                    <td><?= $value->product_name ?></td>
                    <td><?= $value->jumlah ?></td>    
                    <td>buah</td>
                    <td>Rp. <?= number_format($value->price, 2,',','.') ?></td>                                        
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