<?php  
session_start();
error_reporting(0);

  // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    // header("location:login.php?pesan=gagal");
  header("location:login.php");
}
include "page/koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="description" content="Miminium Admin Template v.1">
	<meta name="author" content="Isna Nur Azis">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel Shop Checker</title>
  
  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/fullcalendar.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/datatables.bootstrap.min.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="asset/css/stylee.css">
  <!-- end: Css -->

  <!-- <link rel="shortcut icon" href="asset/img/logokppn.png"> -->
  <style>
    #contento{
      display:none;
    }
    tr .loh{
      height: 120px;
      /*padding: 0px;*/
    }

    td.details-control {
      background: url('../images/details_open.png') no-repeat center center;
      cursor: pointer;
    }
    tr.shown td.details-control {
      background: url('../images/details_close.png') no-repeat center center;
    }

    .container {
      width: 80%;
      margin: 15px auto;
    }
  </style>

</head>

<body id="mimin" class="dashboard">
  <!-- start: Header -->
  <nav class="navbar navbar-default header navbar-fixed-top">
    <div class="col-md-12 nav-wrapper">
      <div class="navbar-header" style="width:100%;">
        <div class="opener-left-menu is-open">
          <span class="top"></span>
          <span class="middle"></span>
          <span class="bottom"></span>
        </div>
        <ul class="nav navbar-nav search-nav">
          <li>
           <!-- <div class="search">
            <span class="fa fa-search icon-search" style="font-size:23px;"></span>
            <div class="form-group form-animate-text">
              <input type="text" class="form-text" required>
              <span class="bar"></span>
              <label class="label-search">Type anywhere to <b>Search</b> </label>
            </div>
          </div> -->
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right user-nav" style="padding-right: 5%">
       <li class="user-name animated fadeInLeft"><span><?php echo $_SESSION['username']; ?></span></li>
       <li class="dropdown avatar-dropdown">
         <img src="asset/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
       </li>
       <li><a href="logout.php" style="margin-top: -2px"><img src="asset/img/logout.png" alt="Logout" style="height: 25px"></a></li>
     </ul>
   </div>
 </div>
</nav>
<!-- end: Header -->

<div class="container-fluid mimin-wrapper" >


  <!-- start:Left Menu -->
  <div id="left-menu">


    <div class="sub-left-menu scroll">
      <ul class="nav nav-list">
        <li><div class="left-bg"></div></li>
        <li class="time">
          <h1 class="animated fadeInLeft">21:00</h1>
          <p class="animated fadeInRight">Sat,October 1st 2029</p>
        </li>
        <li class="ripple"><a href="index.php"><span class="fa-home fa"></span>Dashboard</a></li>
        <li class="ripple"><a href="index.php?page=data-pencarian" ><span class="fa-diamond fa" style="padding-right: 6px"></span>Data Pencarian</a></li>
        <li class="ripple"><a href="index.php?page=data-toko"><span class="fa fa-check-square-o"></span>Data Toko</a></li>
        <li class="ripple"><a href="index.php?page=data-produk"><span class="fa fa-check-square-o"></span>Data Produk</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- end: Left Menu -->


<!-- start: content -->
<div id="content">

  <!-- <div class="panel" style="margin-bottom: 0px">
    <div class="panel-body">
      <div class="col-md-6 col-sm-12" style="padding-top: 2%;">
        <h3 class="animated fadeInLeft">S</h3>
        
      </div>
      <div class="col-md-6 col-sm-12">
        <div class="col-md-6 col-sm-12 text-right" style="padding-left:45%;">
          <img class="animated fadeInDown" src="asset/img/logokppn.png" style="height: 100px">
        </div>                  
      </div>
    </div>                    
  </div> -->


  <div class="col-md-12 padding-0" style="padding-top: 0px">
    <div class="panel bg-light-grey text-black">
     <?php 
     if(isset($_GET['page'])){
      $page = $_GET['page'];

      switch ($page) {
        case 'data-pencarian':
        include "page/datapencarian.php";
        break;
        case 'data-pencarian-hapus':
        include "page/datapencarianhapus.php";
        break;

        case 'data-toko':
        include "page/datatoko.php";
        break; 

        case 'data-produk':
        include "page/dataproduk.php";
        break;

        default:
        echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
        break;
      }
    }
    else{
      ?>
      <div class="col-md-12 top-20 padding-0">
        <div class="col-md-12">
          <div class="panel" style="text-align: center; padding: 20px">
            <h3>SELAMAT DATANG 
              <br>DI PANEL ADMIN APLIKASI SHOP CHECKER</h3>
              <!-- <img src="asset/img/home.png" style="width: 400px"> -->
            </div>
          </div>
          <div class="col-md-12 padding-0">
            <div class="col-md-4">
              <div class="panel box-v1">
                <div class="panel-heading bg-blue border-none">
                  <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                    <h4 class="text-left">Data Pencarian</h4>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4>
                     <span class="icon-list icons icon text-right"></span>
                   </h4>
                 </div>
               </div>
               <div class="panel-body text-center">

                <?php 
                $data_pencarian = mysqli_query($koneksi,"select * from data_pencarian");
                $cek = mysqli_num_rows($data_pencarian);
                echo "<h1>".$cek."</h1>";
                ?>
                <hr>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-dark-blue border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Data Toko</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                 <h4>
                   <span class="icon-basket-loaded icons icon text-right"></span>
                 </h4>
               </div>
             </div>
             <div class="panel-body text-center">
              <?php 
              $data_toko = mysqli_query($koneksi,"select * from data_toko");
              $cek = mysqli_num_rows($data_toko);
              echo "<h1>".$cek."</h1>";
              ?>
              <hr>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel box-v1">
            <div class="panel-heading bg-light-blue border-none">
              <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                <h4 class="text-left">Data Produk</h4>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6 text-right">
               <h4>
                 <span class="fa fa-cubes icons icon text-right"></span>
               </h4>
             </div>
           </div>
           <div class="panel-body text-center">
            <?php 
            $data_produk = mysqli_query($koneksi,"select * from data_produk");
            $cek = mysqli_num_rows($data_produk);
            echo "<h1>".$cek."</h1>";
            ?>
            <hr>
          </div>
        </div>
      </div>
    </div>
    
    <!-- <div class="panel-heading-white panel-heading">
      <h4>Line Chart</h4>
    </div> -->
    

    <!-- <div class="col-md-12">
      <div class="panel" style="text-align: center; padding: 30px">
        <canvas class="line-chart" style="width: 400px; height: 200px;" height="200" width="500"></canvas>
     </div>
   </div> -->

   <!-- <div class="col-md-12">
     <canvas id="linechart" width="100" height="100"></canvas>
   </div> -->
   <div class="col-md-12">
     <div class="panel" style="text-align: center; padding: 30px">
      <select id="box1" onChange="myNewFunction(this);">
       <option value="pilih" disabled selected>Silahkan Pilih Keyword</option>
       <?php
       $hasil = mysqli_query($koneksi,"select * from data_pencarian");
       while ($data = $hasil->fetch_assoc()) {
        echo '<option value="'.$data['keyword'].'">'.$data['keyword'].'</option>';        
      }
      ?>
    </select>
    <div class="container">
      <canvas id="linechart" style="width: 400px; height: 200px;" height="200" width="500"></canvas>
    </div>
  </div>
</div>


</div>
<?php

}

?>


</div>
</div>
<!-- end: content -->




</div>


<!-- start: Javascript -->
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery.ui.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>

<script src="asset/js/js.js"></script>
<script src="asset/js/js1.js"></script>


<!-- plugins -->
<script src="asset/js/plugins/moment.min.js"></script>
<script src="asset/js/plugins/fullcalendar.min.js"></script>
<script src="asset/js/plugins/jquery.nicescroll.js"></script>
<script src="asset/js/plugins/jquery.vmap.min.js"></script>
<script src="asset/js/plugins/maps/jquery.vmap.world.js"></script>
<script src="asset/js/plugins/jquery.vmap.sampledata.js"></script>
<script src="asset/js/plugins/chart.min.js"></script>
<script src="asset/js/plugins/Chart.js"></script>

<!-- plugin tables -->
<script src="asset/js/plugins/jquery.datatables.min.js"></script>
<script src="asset/js/plugins/datatables.bootstrap.min.js"></script>




<!-- custom -->
<script src="asset/js/main.js"></script>
<script>
  function myclick(){
    var x =document.getElementById("myclass");
    if (x.style.display==="none") {
      x.style.display="block";
    } else {
      x.style.display="none";
    }
  }
</script>
<script>
  function myclick1(){
    var x =document.getElementById("myclass1");
    if (x.style.display==="none") {
      x.style.display="block";
    } else {
      x.style.display="none";
    }
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
</script>




<!-- end: Javascript -->
</body>
</html>


<script type="text/javascript">
  function myNewFunction(sel) {
    console.log(sel.options[sel.selectedIndex].text);
    var label = sel.options[sel.selectedIndex].text;
    var da = false;

    let globArr = [];

    $.ajax({
      url : 'modules/chart.php',
      type : 'POST',
      data: {keyword: label},
      success: function(data){
        da = data.split(' ');
        $.each(da, function(){
          globArr.push(parseInt(this));
        });;
      },
      async: false
    });
    console.log(globArr);

    var sum = globArr.reduce(function(a, b){

      return a + b;

    }, 0);

    

    console.log(sum);

    var ctx = document.getElementById("linechart").getContext("2d");
    var data = {
      labels: ["ASLI", "RATING BAIK", "PALSU"],
      datasets: [
      {
        label: label+" ("+sum+" data toko)",
        fill: false,
        lineTension: 0.1,
        backgroundColor: "#29B0D0",
        borderColor: "#29B0D0",
        pointHoverBackgroundColor: "#29B0D0",
        pointHoverBorderColor: "#29B0D0",
        data: globArr
      }
      ]
    };
    // console.log(da);
    var myBarChart = new Chart(ctx, {
      type: 'line',
      data: data,
      options: {
        legend: {
          display: true
        },
        barValueSpacing: 20,
        scales: {
          yAxes: [{
            ticks: {
              min: 0,
            }
          }],
          xAxes: [{
            gridLines: {
              color: "rgba(0, 0, 0, 0)",
            }
          }]
        }
      }
    });

  }

  var ctx = document.getElementById("linechart").getContext("2d");
  var data = {
    labels: ["ASLI", "RATING BAIK", "PALSU"],
    datasets: [
    {
      label: "Semua Data ("+<?php $data = mysqli_query($koneksi,"SELECT * FROM data_toko");
      $cek1 = mysqli_num_rows($data); echo $cek1;?>+" data toko)",
      fill: false,
      lineTension: 0.1,
      backgroundColor: "#29B0D0",
      borderColor: "#29B0D0",
      pointHoverBackgroundColor: "#29B0D0",
      pointHoverBorderColor: "#29B0D0",
      data: [<?php $asli = mysqli_query($koneksi,"SELECT * FROM data_toko where status='Asli'");
      $cek1 = mysqli_num_rows($asli); echo $cek1;?>,<?php $rating_baik = mysqli_query($koneksi,"SELECT * FROM data_toko where status='Rating Baik'");
      $cek2 = mysqli_num_rows($rating_baik); echo $cek2;?>,<?php $palsu = mysqli_query($koneksi,"SELECT * FROM data_toko where status='Palsu'");
      $cek4 = mysqli_num_rows($palsu); echo $cek4;?>]
    }
    ]
  };

  var myBarChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: {
      legend: {
        display: true
      },
      barValueSpacing: 20,
      scales: {
        yAxes: [{
          ticks: {
            min: 0,
          }
        }],
        xAxes: [{
          gridLines: {
            color: "rgba(0, 0, 0, 0)",
          }
        }]
      }
    }
  });
</script>