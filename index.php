<!DOCTYPE html>
<html lang="en">
<head>
  <!-- <marquee><title>Aplikasi Deteksi Toko Online Asli atau Palse Pada E-commerce</title></marquee> -->
  <script type='text/javascript'>
//<![CDATA[
teks = "Aplikasi Deteksi Toko Online Asli atau Palsu Pada E-commerce";posisi = 0;
function animasi_teks() {
  document.title = teks.substring(posisi, teks.length) + teks.substring(0, posisi); posisi++;
  if (posisi > teks.length) posisi = 0
    window.setTimeout("animasi_teks()",200);
}
animasi_teks();
//]]>
</script> 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="admin/asset/js/jquery.min.js"></script>
<script src="admin/asset/js/plugins/jquery.datatables.min.js"></script>

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

  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
-->
<link rel="stylesheet" href="css/flaticon.css">
<link rel="stylesheet" href="css/icomoon.css">
<link rel="stylesheet" href="css/style.css">

<style type="text/css">
  tr .loh{
    height: 120px;
    /*padding: 0px;*/
  }

  td.details-control {
    background: url('images/details_open.png') no-repeat center center;
    cursor: pointer;
  }
  tr.shown td.details-control {
    background: url('images/details_close.png') no-repeat center center;
  }

  .hide{
    background: url('img/details_open.png') no-repeat center center;
    cursor: pointer;
  }

  .oh{
    display: inline-block;
    /*width: 49%;*/
    height: 100%;
    /*padding: 5px;*/
  }

  .ho{
    display: inline-block;
    /*width: 60%;*/
    height: 100%;
    /*padding: 5px;*/
  }


  #tabel {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #tabel td, #tabel th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #tabel tr:nth-child(even){background-color: #f2f2f2;}

  /*#tabel tr:hover {background-color: #ddd;}*/

  #tabel th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #ffa323;;
    color: white;
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
        <li class="nav-item active"><a href="index.php" class="nav-link">Beranda</a></li>
        <li class="nav-item"><a href="data_pencarian.html" class="nav-link">Data Pencarian</a></li>
        <li class="nav-item"><a href="about.html" class="nav-link">Tentang Aplikasi</a></li>
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

      <div class="col-md-12 col-sm-12 text-center ftco-animate" >
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
      <input type="text" name="jumlah" maxlength="4" class="form-group form-control" id="jumlah" placeholder="Jumlah Pencarian" required="">
      <input type="submit" name="" value="Cek Toko" class="btn btn-primary py-3 px-5 buttonn form-group" id="button1">
    </form>
  </div>
</div>
</div>
</section>



<!-- <section class="ftco-section bg-light third" style="display: none;"> -->
  <section class="ftco-section bg-light third" id="hasil" style="display: none">
    <!-- <div class="container"> -->
      <div class="container">
        <div class="row justify-content-center mb-2">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Services</span>
            <h2 class="mb-4">Hasil Pencarian</h2>
          </div>
        </div>
        <div id="statusbar" style="background-color: #FFE77AFF; margin-bottom: 10px; padding: 5px; display: none">
          <b>Status:</b> <span id="status"></span> <span style="float: right;" id="jumlah-toko"></span>
        </div>


        <div class="pencarian">

          <table class="table1" border="1" id="tabel">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Toko</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody id="data-tabel">         
            </tbody>
          </table>
        </div>
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
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->

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

      $('#jumlah').on('keydown', function(e){
        -1!==$
        .inArray(e.keyCode,[46,8,9,27,13,110,190]) || /65|67|86|88/
        .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey)
        || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey|| 48 > e.keyCode || 57 < e.keyCode)
        && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
      });
    </script>

    <script>
      $('#data-tabel').on('click','.toggle', function()
      {
        var tr = $(this).closest('tr');
        var target = $(this).data('target');
        console.log(tr);
        $('.'+target).toggle();
        tr.toggleClass('shown');
      });
    </script>

    <script src="modules/js/ambil.js"></script>

  </body>
  </html>