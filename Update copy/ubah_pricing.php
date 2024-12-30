<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDAM</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden;
      font-family: Arial, sans-serif;
    }

    .container-login100 {
      /* Full screen water-like gradient background */
      background: linear-gradient(to bottom right, #ffffff, #0077b6);
      background-size: cover;
      background-position: center;
      width: 100vw;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #e0e0e0;
    }

    .container {
      max-width: 900px;
      padding: 20px;
      background-color: #c8eeeb; /* Semi-transparent background */
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .table {
      color: #e0e0e0;
      background-color: #333333;
    }

    .table th, .table td {
      border-color: #444444;
      border: 1px solid black;
      color: #000000; 
    }

    .table tbody tr {
      background-color: #e7f9f8;
    }

    .btn-outline-primary {
      color: #007bff;
      border-color: #007bff;
    }

    .btn-outline-primary:hover {
      background-color: #007bff;
      color: #ffffff;
    }

    .table-title {
      font-size: 1.5rem;
      margin-bottom: 10px;
      font-weight: 500;
      color: #000000;
    }
  </style>
</head>
<body>
  <div class="container-login100">
    <div class="container">
      <div class="table-title" >Update Pricing</div>

      <?php
      include '../Sistem/koneksi.php';
      $id = $_GET['id'];
      $data = mysqli_query($koneksi,"SELECT * FROM tarif WHERE id_tarif='$id'");
      while($d = mysqli_fetch_array($data)){
      ?>

      <form method="post" action="../Sistem/update.php">
        <input type="hidden" name="id" value="<?php echo $d['id_tarif']; ?>">
        <table class="table">
          <tr>            
            <td>No.</td>
            <td><?php echo $d['id_tarif']; ?></td>
          </tr>
          <tr>
            <td>First lower limit<br> Update lower limit</td>
            <td><?php echo $d['batas_bawah']; ?>m3<br> <input type="text" name="batas_bawah" value="<?php echo $d['batas_bawah']; ?>">m3</td> 
          </tr>
          <tr>
            <td>First upper limit<br> Update upper limit</td>
            <td><?php echo $d['batas_atas']; ?>m3<br> <input type="text" name="batas_atas" value="<?php echo $d['batas_atas']; ?>">m3</td> 
          </tr>
          <tr>
            <td>First price per m3<br> Update price per m3  </td>
            <td>Rp.<?php echo $d['tarif_per_m3']; ?><br> Rp.<input type="text" name="tarif_per_m3" value="<?php echo $d['tarif_per_m3']; ?>"></td> 
          </tr>
          <td colspan="3">
            <button type="submit" class="btn btn-outline-primary">Simpan</button> 
            <a href="../Home/index.php"><button type="button" class="btn btn-outline-primary">Cancel</button></a>
          </td>       
        </table>
      </form>
      <?php 
      }
      ?>
    </div>
  </div>
</body>
</html>
