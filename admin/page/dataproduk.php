        <div class="col-md-12 top-20 padding-0">
          <div class="col-md-12">
            <div class="panel">
              <div class="panel-heading"><h3>Data Produk</h3></div>
              <div class="panel-body">
                <div class="responsive-table">
                  <table id="datatables-example" class="table table-striped table-bordered datatab" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th style="vertical-align : middle; text-align: center " ></th>
                        <th style="vertical-align : middle; text-align: center " >Keyword</th>
                        <th style="vertical-align : middle; text-align: center " >Nama Produk</th>
                        <th style="vertical-align : middle; text-align: center; width: 10%" >Harga</th>
                        <th style="vertical-align : middle; text-align: center;" >Terjual</th>
                        <th style="vertical-align : middle; text-align: center;" >Rating</th>
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
    '<td style="width:30%"><b>Bintang 5</b></td>'+
    '<td>'+d.bintang5+'</td>'+
    '<td style="width:30%"><b>Rating Dengan Foto</b></td>'+
    '<td>'+d.ratingdgnfoto+'</td>'+
    '<td rowspan="5" style="width:40%; text-align:center"><img src="https://cf.shopee.co.id/file/'+d.gambar_produk+'" height="250px"></td>'+
    '</tr>'+
    '<tr>'+
    '<td><b>Bintang 4</b></td>'+
    '<td>'+d.bintang4+'</td>'+
    '<td><b>Rating Dengan Text</b></td>'+
    '<td>'+d.ratingdgntext+'</td>'+
    '</tr>'+
    '<tr>'+
    '<td><b>Bintang 3</b></td>'+
    '<td>'+d.bintang3+'</td>'+
    '<td><b>Rating Produk</b></td>'+
    '<td>'+d.rating_produk+'</td>'+
    '</tr>'+
    '<tr>'+
    '<td><b>Bintang 2</b></td>'+
    '<td>'+d.bintang2+'</td>'+
    '<td><b>Jumlah Penilai</b></td>'+
    '<td>'+d.jumlah_penilai+'</td>'+
    '</tr>'+
    '<tr>'+
    '<td><b>Bintang 1</b></td>'+
    '<td>'+d.bintang1+'</td>'+
    '<td colspan="2"><a target="_blank" href="https://shopee.co.id/'+d.nama_produk.replace(/ /g, "-")+'-i.'+d.shopid+'.'+d.itemid+'">Kunjungi Produk</a></td>'+
    '</tr>'+
    '</table>';
  }

  $(document).ready(function() {
    var table = $('#datatables-example').DataTable( {
      "ajax": "modules/produk.php",
      "columns": [
      {
        "className":      'details-control',
        "orderable":      false,
        "data":           null,
        "defaultContent": ''
      },
      { "data": "keyword" },
      { "data": "nama_produk" },
      { "data": "harga_produk" },
      { "data": "produk_terjual" },
      { "data": "rating_produk" }
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