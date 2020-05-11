
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
              <h3 class="box-title">Data Table With Full Features</h3>
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
                  <th>Komposisi</th>
                  <th>Status</th>
                  <th>Stock</th>                  
                  <th>Biaya Pemesanan</th>                  
                  <th>Biaya Penyimpanan</th>                  
                  <th>EOQ</th>                  
                  <th>Frekuensi Pemesanan</th>                  
                  <th>ROP</th>                  
                  <th>SS</th>                                                      
                </tr>
                </thead>
                <tbody>
                <?php $no = 0; foreach ($stock as $key => $value) { $no++; ?>
                  <tr>
                    <td><?= $no ?></td>                    
                    <td><b><?= $value->komposisi_name ?></b></a></td>
                    <td><?php if ($value->stock <= $value->eoq) { ?>
                      <small class="label label-danger"><i class="fa fa-clock-o"></i> Your's Stock Need to Order</small>
                    <?php } else{ ?>
                      <small class="label label-info"><i class="fa fa-clock-o"></i> Your's Stock is safe</small>
                    <?php } ?></td>
                    <td><?= $value->stock ?></td>                    
                    <td><?= $value->biaya_pemesanan ?></td>                    
                    <td><?= $value->biaya_penyimpanan ?></td>                    
                    <td><?= $value->eoq ?></td>                    
                    <td><?= $value->frekuensi_pemesanan ?></td>                    
                    <td><?= $value->rop ?></td>                    
                    <td><?= $value->ss ?></td>                                                          
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
