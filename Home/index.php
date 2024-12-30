<?php 
include '../Sistem/koneksi.php'; 

// Count the number of rows in the table
$userCountResult = mysqli_query($koneksi, "SELECT COUNT(*) AS total1 FROM pelanggan"); 
$userCountRow = mysqli_fetch_assoc($userCountResult); 
$userCount = $userCountRow['total1'];

$industriCountResult = mysqli_query($koneksi, "SELECT COUNT(*) AS total2 FROM pelanggan WHERE id_golongan = 2"); 
$industriCountRow = mysqli_fetch_assoc($industriCountResult); 
$industriCount = $industriCountRow['total2'];

$houseCountResult = mysqli_query($koneksi, "SELECT COUNT(*) AS total3 FROM pelanggan WHERE id_golongan = 1"); 
$houseCountRow = mysqli_fetch_assoc($houseCountResult); 
$houseCount = $houseCountRow['total3'];
?>

<!DOCTYPE html>
<html lang="en">

<style>

    .table {
      color: black;
      background-color: #8f8f8f;
    }
    .table th, .table td {
      border-color: #000000;
	    border: 1px solid black;
      color: #000000; 
    }
    .table tbody tr{
      background-color: #efefef;
    }

</style>

    <head>
        <meta charset="utf-8">
        <title>PDAM</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wdth,wght@0,75..100,300..800;1,75..100,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary"><i class="fas fa-hand-holding-water me-3"></i>PDAM</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="user.php" class="nav-item nav-link">User</a>
                    </div>
                    <a href="../Flogin/Flogin.php" class="btn btn-primary rounded-pill d-inline-flex flex-shrink-0 py-2 px-4">Log out</a>
                </div>
            </nav>

            <div class="container-fluid bg-breadcrumb">
                <div class="container py-5" style="max-width: 900px;">
                    <p class="text-white display-1 mb-4 wow fadeInDown" data-wow-delay="0.1s">What is PDAM?</p>
                    <h4 class="text-white mb-4 wow fadeInDown" data-wow-delay="0.1s">PDAM stands for Perusahaan Daerah Air Minum, a regional-owned enterprise (BUMD) that provides clean water to the community. PDAM has the task of managing, processing, purifying, and distributing clean water to customers.</h4>
                </div>
            </div>

<!-- Fact Counter -->
<div class="container-fluid counter py-5">
    <div class="container py-5">
        <div class="row g-3">
            <div class="col-md-3 col-lg-3 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="counter-item">
                    <div class="counter-item-icon mx-auto">
                        <i class="fas fa-thumbs-up fa-3x text-white"></i>
                    </div>
                    <h4 class="text-white my-4">User</h4>
                    <div class="counter-counting">
                        <span class="text-white fs-2 fw-bold" data-toggle="counter-up"><?php echo $userCount; ?></span>
                        <span class="h1 fw-bold text-white">+</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="counter-item">
                    <div class="counter-item-icon mx-auto">
                        <i class="fas fa-truck fa-3x text-white"></i>
                    </div>
                    <h4 class="text-white my-4">Industry</h4>
                    <div class="counter-counting">
                        <span class="text-white fs-2 fw-bold" data-toggle="counter-up"><?php echo $industriCount; ?></span>
                        <span class="h1 fw-bold text-white">+</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="counter-item">
                    <div class="counter-item-icon mx-auto">
                        <i class="fas fa-users fa-3x text-white"></i>
                    </div>
                    <h4 class="text-white my-4">House</h4>
                    <div class="counter-counting">
                        <span class="text-white fs-2 fw-bold" data-toggle="counter-up"><?php echo $houseCount ?></span>
                        <span class="h1 fw-bold text-white">+</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fact Counter -->


            <!-- INFORMATION CONTAINER -->
        <div class="container-fluid feature bg-light py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h1 class="display-3 text-capitalize mb-3">Information</h1>
                </div>
                <div class="row g-4">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <div class="feature-item p-4">
                            <div class="feature-icon mb-3"><i class="fas fa-hand-holding-water text-white fa-3x"></i></div>
                            <h class="h4 mb-3">Pricing</h>
                            <table class="table">
                                
                                  <tr background-color: #3d3d3d;>
                                    <th>No. </th>
                                    <th>Group</th>
                                    <th>Lower limit</th>
                                    <th>Upper limit</th>
                                    <th>Price per meter3</th>
                                    <th>Edit</th>

                                  </tr>
                                  <?php 
                                  include '../Sistem/koneksi.php';
                                  $no = 1;
                                  $data = mysqli_query($koneksi,"select * from tarif");
                                  while($d = mysqli_fetch_array($data)){
                                      ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $d['id_golongan']; ?></td>
                                            <td><?php echo $d['batas_bawah']; ?>m3</td>
                                            <td><?php echo $d['batas_atas']; ?>m3</td> 
                                            <td>Rp.<?php echo $d['tarif_per_m3']; ?></td> 
                                            <td>
                                                <a role ="button" class="btn btn-info btn-sm" href="../Update/ubah_pricing.php?id=<?php echo $d['id_tarif']; ?>"><img src="../Image/pen.svg" alt="edit"></a> </button>
                                                <a role="button" class="btn btn-danger btn-sm" href="../Sistem/hapus_pricing.php?id=<?php echo $d['id_tarif']; ?>"><i class="bi bi-trash"></i></a>                                        
                                            </td>                                        
                                        </tr>
                                      <?php 
                                  }
                                  ?>
                             </table> 

                             <p>Add pricing
                            <a href="../Update/tambah_pricing.php"><button type='button' class='btn btn-primary btn-large btn-start'><i class="bi bi-plus"></i></button></a>
                            </p>

                            <h class="h4 mb-3">Group</h>
                            <table class="table">
                                
                                  <tr background-color: #3d3d3d;>
                                    <th>Id Group </th>
                                    <th>Group Name</th>
                                    <th>Desc</th>
                                    <th>Edit</th>
                                    
                                  </tr>
                                  <?php 
                                  include '../Sistem/koneksi.php';
                                  $no = 1;
                                  $data = mysqli_query($koneksi,"select * from golongan");
                                  while($d = mysqli_fetch_array($data)){
                                      ?>
                                      <tr>
                                          <td><?php echo $d['id_golongan']; ?></td>
                                          <td><?php echo $d['nama_golongan']; ?></td>
                                          <td><?php echo $d['deskripsi']; ?></td> 
                                          <td><a role="button" class="btn btn-danger btn-sm" href="../Sistem/hapus_golongan.php?id=<?php echo $d['id_golongan']; ?>"><i class="bi bi-trash"></i></a></td>                                         
                                      </tr>
                                      <?php 
                                  }
                                  ?>
                            </table>
                            <p>Add group
                            <a href="../Update/tambah_group.php"><button type='button' class='btn btn-primary btn-large btn-start'><i class="bi bi-building-add"></i></button></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- INFORMATION END -->

        </div>
            
        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>