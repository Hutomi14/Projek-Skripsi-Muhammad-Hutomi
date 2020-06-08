        <div class="col-md-12 top-20 padding-0">
          <div class="col-md-12">
            <div class="panel">
              <div class="panel-heading"><h3>Data Toko</h3></div>
              <div class="panel-body">
                <div class="responsive-table">
                  <table id="datatables-example" class="table table-striped table-bordered datatab" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th style="vertical-align : middle; text-align: center " ></th>
                        <th style="vertical-align : middle; text-align: center " >Keyword</th>
                        <th style="vertical-align : middle; text-align: center " >Nama Toko</th>
                        <th style="vertical-align : middle; text-align: center; width: 10%" >Rating</th>
                        <th style="vertical-align : middle; text-align: center;" >Pemilik</th>
                        <th style="vertical-align : middle; text-align: center;" >Status Toko</th>
                      </tr>
                    </thead>
                    <tbody>
                   </tbody>
                 </table>
               </div>


             </div>
           </div>
         </div>
       </div>

     </body>
     <!-- <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
     <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script> -->
     <!-- <script>
      $(document).ready(function() {
        $('.datatab').DataTable();
      } );
    </script> -->


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
    <!-- <script type="text/javascript">
      $(document).ready(function(){
        $('#datatables-example').DataTable();
      });
    </script> -->
    <!-- end: Javascript -->
    <script>
      /* Formatting function for row details - modify as you need */
      function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
    '<tr>'+
    '<td style="width:15%"><b>Jumlah Produk</b></td>'+
    '<td style="width:55%">'+d.jumlah_produk+'</td>'+
    '<td style="width:15%"><b>Rating Baik</b></td>'+
    '<td style="width:15%">'+d.rating_baik+'</td>'+
    '</tr>'+
    '<tr>'+
    '<td><b>Lokasi Toko</b></td>'+
    '<td>'+d.lokasi_toko+'</td>'+
    '<td><b>Rating Normal</b></td>'+
    '<td>'+d.rating_normal+'</td>'+
    '</tr>'+
    '<tr>'+
    '<td><b>Pengiriman</b></td>'+
    '<td>'+d.pengiriman+'</td>'+
    '<td><b>Rating Buruk</b></td>'+
    '<td>'+d.rating_buruk+'</td>'+
    '</tr>'+
    '<tr>'+
    '<td><b>Rating Toko</b></td>'+
    '<td>'+d.rating_toko+' ('+parseInt(parseInt(d.rating_baik)+parseInt(d.rating_normal)+parseInt(d.rating_buruk))+' Penilai)</td>'+
    '<td><b>Follower</b></td>'+
    '<td>'+d.follower+'</td>'+
    '</tr>'+
    '<tr>'+
    '<td colspan="2"><a target="_blank" href="https://shopee.co.id/'+d.pemilik_toko+'">Kunjungi Toko</a></td>'+
    '<td><b>Following</b></td>'+
    '<td>'+d.following+'</td>'+
    '</tr>'+
    '</table>';
  }

  $(document).ready(function() {
    var table = $('#datatables-example').DataTable( {
      "ajax": "modules/toko.php",
      "columns": [
      {
        "className":      'details-control',
        "orderable":      false,
        "data":           null,
        "defaultContent": ''
      },
      { "data": "keyword" },
      { "data": "nama_toko" },
      { "data": "rating_toko" },
      { "data": "pemilik_toko" },
      { "data": "status" }
      ],
      "order": [[1, 'asc']]
    } );

    // Add event listener for opening and closing details
    $('#datatables-example tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      console.log(tr);
      var row = table.row( tr );
      console.log(row);

      if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
          }
          else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
          }
        } );
  } );

</script>
</body>
</html>