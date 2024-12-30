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
    .bottom-center {
    position: relative;
    bottom: 0;
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
                    <h1 class="text-primary"><i class="fas fa-hand-holding-water me-3"></i>Acuas</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="user.php" class="nav-item nav-link active">User</a>
                    </div>
                    <a href="../Flogin/Flogin.html" class="btn btn-primary rounded-pill d-inline-flex flex-shrink-0 py-2 px-4">Log out</a>
                </div>
            </nav>

            <!-- Header Start -->
            <div class="container-fluid bg-breadcrumb">
                <div class="container text-center py-5" style="max-width: 900px;">
                    <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">User</h4>
                    <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active text-primary">User</li>
                    </ol>    
                </div>
            </div>
            <!-- Header End -->
        </div>
        <!-- Navbar & Hero End -->

        <!-- feature Start -->
        <div class="container-fluid feature bg-light py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h1 class="display-3 text-capitalize mb-3">Information</h1>
                </div>
                <div class="row g-4">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">                    

                    
                        <div class="feature-item p-4">
                            

                        
                            <div class="feature-icon mb-3"><i class="fas fa-hand-holding-water text-white fa-3x"></i></div>
                            
                            
                            
                            <h class="h4 mb-3">Customer</h>
                           
                            

                            <table class="table">
                                  <tr background-color: #3d3d3d;>
                                    <th>ID. Customer</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Group</th>
                                    <th>Status Aktif</th>
                                    <th>Edit</th>

                                  </tr>
                                  <?php 
                                  include '../Sistem/koneksi.php';
                                  $no = 1;
                                  $data = mysqli_query($koneksi,"select * from pelanggan");
                                  while($d = mysqli_fetch_array($data)){
                                      ?>
                                        <tr>
                                            <td><?php echo $d['id_pelanggan']; ?></td>
                                            <td><?php echo $d['nama']; ?></td>
                                            <td><?php echo $d['alamat']; ?></td> 
                                            <td>0<?php echo $d['no_telepon']; ?></td> 
                                            <td><?php echo $d['id_golongan']; ?></td>
                                            <td><form action="../Sistem/update_status.php" method="POST" style="display:inline;">
                                                <input type="hidden" name="id" value="<?php echo $d['id_pelanggan']; ?>">
                                                
                                                <!-- Toggle the status_aktif value depending on the current value -->
                                                <input type="hidden" name="status_aktif" value="<?php echo ($d['status_aktif'] == 'Y') ? 'N' : 'Y'; ?>">
                                                
                                                <button type="submit" class="btn btn-secondary btn-sm">
                                                    <!-- Display 'Y' or 'N' based on the current status -->
                                                    <?php echo ($d['status_aktif'] == 'Y') ? 'Y' : 'N'; ?>
                                                </button>
                                            </form>
                                            </td>  

                                                <td>
                                                
                                                <a role="button" class="btn btn-primary btn-sm" href="cek_penggunaan.php?id=<?php echo $d['id_pelanggan']; ?>"><i class="bi bi-exclamation"></i></a>
                                                
                                             </td>
                                     
                                        </tr>
                                      <?php 
                                  }
                                  ?>
                             </table>
                             
                            <p>Add user
                            <a href="../Update/tambah_user.php"><button type='button' class='btn btn-primary btn-large btn-start'><i class="bi bi-person-plus"></i></button></a>
                            </p>

                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
        <!-- feature End -->
        
        
        

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>