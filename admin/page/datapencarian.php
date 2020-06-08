        <div class="col-md-12 top-20 padding-0">
          <div class="col-md-12">
            <div class="panel">
              <div class="panel-heading"><h3>Data Keyword Pencarian</h3></div>
              <div class="panel-body">
                <!-- <div style="text-align: right; margin-bottom: 10px">
                  <a href="page/dataasetlaporan.php" target="_blank"><span class="icon-box btn btn-primary mt-2 mt-xl-0"><span class="icons icon-printer"></span></span></a>
                </div> -->
                <div class="responsive-table">
                  <table id="datatables-example" class="table table-striped table-bordered datatab" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th style="vertical-align : middle; text-align: center; width: 10px" >NO</th>
                        <th style="vertical-align : middle; text-align: center " >Keyword Pencarian</th>
                        <th style="vertical-align : middle; text-align: center;">Jumlah Pencarian</th>
                        <th style="vertical-align : middle; text-align: center; ">Waktu Pencarian</th>
                        <th style="vertical-align : middle; text-align: center; " >Aksi</th>                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $sql = $koneksi->query("select * from data_pencarian");
                      while ($data = $sql->fetch_assoc()) {
                        ?>
                        <tr>

                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data['keyword']; ?></td>
                          <td><?php echo $data['jumlah']; ?></td>
                          <td><?php echo $data['waktu']; ?></td>
                          <td style="text-align: center;">
                            <!-- Button untuk modal -->
                            <a onclick="return confirm('Data Akan Dihapus, Anda Yakin?')" href="?page=data-pencarian-hapus&id=<?php echo $data['kode_pencarian']; ?>" class="btn btn-danger btn-sm delete-button"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                        <!-- edit modal -->
                        <?php
                      } 
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


      </body>
      <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
      <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
      <script>
        $(document).ready(function() {
          $('.datatab').DataTable();
        } );
      </script>


      <!-- start: Javascript -->
      <script src="asset/js/jquery.min.js"></script>
      <script src="asset/js/jquery.ui.min.js"></script>
      <script src="asset/js/bootstrap.min.js"></script>



      <!-- plugins -->
      <script src="asset/js/plugins/moment.min.js"></script>
      <script src="asset/js/plugins/jquery.datatables.min.js"></script>
      <script src="asset/js/plugins/datatables.bootstrap.min.js"></script>
      <script src="asset/js/plugins/jquery.nicescroll.js"></script>


      <!-- custom -->
      <script src="asset/js/main.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#datatables-example').DataTable();
        });
      </script>
      <!-- end: Javascript -->
