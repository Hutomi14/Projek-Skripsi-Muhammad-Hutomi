<!DOCTYPE html>
<html lang="en">
<head>
  <marquee><title>Aplikasi Deteksi Toko Online Asli atau Palse Pada E-commerce</title></marquee>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Monoton&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Miss+Fajardose&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">

  <style type="text/css">
    tr .loh{
        height: 120px;
        /*padding: 0px;*/
      }
  </style>
</head>
<body style="margin-top: -50px">
 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" >
   <div class="container">
     <a class="navbar-brand" href="index.php">Shop Checker</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
       <span class="oi oi-menu"></span> Menu
     </button>

     <div class="collapse navbar-collapse" id="ftco-nav">
       <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="index.html" class="nav-link">Beranda</a></li>
        <li class="nav-item"><a href="menu.html" class="nav-link">Data Pencarian</a></li>
        <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- END nav -->

<section class="home-slider owl-carousel js-fullheight">
  <div class="slider-item js-fullheight" style="background-image: url(images/bg_1.jpg);">
   <div class="overlay"></div>
   <div class="container">
    <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

      <div class="col-md-12 col-sm-12 text-center ftco-animate">
        <h1 class="mb-4 mt-5">Cek Toko Online Sekarang</h1>
        <p><button class="btn btn-primary p-3 px-xl-4 py-xl-3 button">Cek Sakarang</button> 
          <!-- <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a> -->
        </p>
      </div>

    </div>
  </div>
</div>
</section>


<section class="ftco-section ftco-wrap-about ftco-no-pb second" style="margin-bottom: 100px">
 <div class="container">
  <div class="row justify-content-center">
   <div class="col-sm-10 wrap-about ftco-animate text-center">
     <div class="heading-section mb-4 text-center">
      <span class="subheading">Cek</span>
      <h2 class="mb-4">Toko Online</h2>
    </div>
    <form>
      <input type="text" name="keyword" class="form-group form-control" id="keyword" placeholder="Keyword Pencarian" required="">
      <input type="text" name="jumlah" class="form-group form-control" id="jumlah" placeholder="Jumlah Pencarian" required="">
      <input type="submit" name="" value="Cek Toko" class="btn btn-primary py-3 px-5 buttonn form-group" id="button1">
    </form>
    <!-- <form>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Nama Anda" name="nama" id="nama" required="">
      </div>
      <div class="form-group">
        <input type="text" class="form-control keyword_pencarian" id="keyword" placeholder="Keyword Pencarian" name="keyword" required/>
      </div>
      <div class="form-group">
        <input type="text" class="form-control jumlah_pencarian" id="jumlah" placeholder="Jumlah Pencarian" name="jumlah" required/>
      </div>
      <div class="form-group">
        <input type="submit" value="Cek Toko" class="btn btn-primary py-3 px-5 buttonn" id="button1" name="button1">
      </div>
    </form> -->
  </div>
</div>
</div>
</section>



<!-- <section class="ftco-section bg-light third" style="display: none;"> -->
  <section class="ftco-section bg-light third">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Services</span>
        <h2 class="mb-4">Hasil Pencarian</h2>
      </div>
    </div>

    <div class="pencarian">
     
      <table class="table1">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Toko</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody id="tai">
         <!--  <tr>
            <th scope="row" id="no"></th>
            <td id="satu"></td>
            <td id="dua"></td>
            <td id="tiga"></td>
          </tr> -->
          
        </tbody>
      </table>
    </div>

    <!-- <table id="table1">
      <thead>
        <tr>
          <th style="width: 3%">No</th>
          <th>Nama Produk</th>
          <th>Toko</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Ram</td>
          <td>21</td>
          <td>Male</td>
          
        </tr>
        <tr>
          <td>2</td>
          <td>Mohan</td>
          <td>32</td>
          <td>Male</td>
          
        </tr>
        
      </tbody>
    </table> -->

  </div>
</section>








<footer>
  <div class="col-md-12 text-center ftco-bg-dark" style="height: 50px; font-size: 14px;
  background: #141313;">

  <p style="padding-top:12px"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
  </div>
</footer>






<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
<!-- <script src="js/google-map.js"></script> -->
<script src="js/main.js"></script>

<!-- table -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function () {
    $('#table1').DataTable();
  });
</script>

<!-- tombol hide scroll -->
<script>
  $(".button").click(function() {
    $('html,body').animate({
      scrollTop: $(".second").offset().top},
      'slow');
  });

  $(".button1").click(function() {
    $(".third").show();
    $('html,body').animate({
      scrollTop: $(".third").offset().top},
      'slow');
  });
</script>


<script>
  /* Formatting function for row details - modify as you need */
  function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
    '<tr>'+
    '<td>Full name:</td>'+
    '<td>'+d.name+'</td>'+
    '</tr>'+
    '<tr>'+
    '<td>Extension number:</td>'+
    '<td>'+d.extn+'</td>'+
    '</tr>'+
    '<tr>'+
    '<td>Extra info:</td>'+
    '<td>And any further details here (images etc)...</td>'+
    '</tr>'+
    '</table>';
  }

  $(document).ready(function() {
    var table = $('#example').DataTable( {
      "ajax": "../ajax/data/objects.txt",
      "columns": [
      {
        "className":      'details-control',
        "orderable":      false,
        "data":           null,
        "defaultContent": ''
      },
      { "data": "name" },
      { "data": "position" },
      { "data": "office" },
      { "data": "salary" }
      ],
      "order": [[1, 'asc']]
    } );

    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = table.row( tr );

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

<script>
  // function validateFormm() {
  //   var x = document.forms["ajax"]["nama"].value;
  //   var y = document.forms["ajax"]["keyword_pencarian"].value;
  //   var z = document.forms["ajax"]["jumlah_pencarian"].value;

  //   if (x !== null && y !== null && z !== null) {
  //     $(".third").show();
  //     $('html,body').animate({
  //       scrollTop: $(".third").offset().top},
  //       'slow');
  //     // $('.pencarian').load('ini.php');
  //     return false;
  //     $.ajax({
  //               type: "POST",
  //               url: "ini.php", // 
  //               data: {
  //                 keyword_pencarian: $("input.keyword_pencarian").val(),
  //                 jumlah_pencarian: $("input.jumlah_pencarian").val()
  //               },
  //               success: function(msg){
  //                   $(".pencarian").html(msg)  
  //               },
  //               error: function(){
  //                   alert("failure");
  //               }
  //           });
  //   }

  // }

  // $(".buttonn").click(function() {
  //   $.ajax({
  //               type: "POST",
  //               url: "ini.php", // 
  //               data: {
  //                 keyword_pencarian: $("input.keyword_pencarian").val(),
  //                 jumlah_pencarian: $("input.jumlah_pencarian").val()
  //               },
  //               success: function(msg){
  //                   $(".pencarian").html(msg)  
  //               },
  //               error: function(){
  //                   alert("failure");
  //               }
  //           });
  // });
</script>

<script src="good.js"></script>

</body>
</html>