
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
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>                  
                  <th>Komposisi</th>
                  <th>Stock</th>                  
                  <th>Biaya Pemesanan</th>                  
                  <th>Biaya Penyimpanan</th>                  
                  <th>EOQ</th>                  
                  <th>Frekuensi Pemesanan</th>                  
                  <th>ROP</th>                  
                  <th>SS</th>                                    
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 0; foreach ($stock as $key => $value) { $no++; ?>
                  <tr>
                    <td><?= $no ?></td>                    
                    <td><?= $value->komposisi_name ?></td>
                    <td><?= $value->stock ?></td>                    
                    <td><?= $value->biaya_pemesanan ?></td>                    
                    <td><?= $value->biaya_penyimpanan ?></td>                    
                    <td><?= $value->eoq ?></td>                    
                    <td><?= $value->frekuensi_pemesanan ?></td>                    
                    <td><?= $value->rop ?></td>                    
                    <td><?= $value->ss ?></td>                                        
                    <td>                      
                      <button data-toggle="modal" data-target="#myModal3" class="but">dd</button>
                      <a href="<?php echo base_url('kepala_gudang/stock_define/'. $value->id) ?>"><i class="fa fa-edit"></i></a>                                                        
                    </td>                    
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

  <div class="modal modal-danger fade" id="myModal3">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Update Status Order</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url('admin/store_edit_supp_order/'. $value->id)  ?>">
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status" required>
              <option>Select</option>                              
                <option value="1">Sudah di Order Ke Supplier</option>
                <option value="2">Orderan Sudah di Terima</option>
            </select>
          </div>                         
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" rows="6" name="description"> </textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline">Update Data</button>                          
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

   <script type="text/javascript">
    $(document).ready(function() {
        $('.but').trigger('click');
    })
</script>