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
      <div class="table-title" >Add payment</div>
        <div class="mb-3">

        <?php
      include '../Sistem/koneksi.php';
      $id = $_GET['id'];
      $id2 = $_GET['id2'];
      $data = mysqli_query($koneksi,"SELECT * FROM penggunaan WHERE id_penggunaan='$id'");
      while($d = mysqli_fetch_array($data)){
      ?>
      <form method="post" action="../Sistem/tambah_pembayaran.php">
        <table  class="table">
        <tr>
            <td>ID. Uses</td>
            <td><?php echo $d['id_penggunaan']; ?></td>
        </tr>
          <tr>
            <td>Date payment</td>
            <td><input type="date" name="tanggal_pembayaran"></td>
            <input type="hidden" name="status_pembayaran" value="N">
            <input type="hidden" name="id_pelanggan" value="<?php echo $id; ?>">
            <input type="hidden" name="id_penggunaan" value="<?php echo $id2; ?>">
          </tr>
          <tr>
            <td colspan=3>
                    <button type="input" class="btn btn-outline-primary">Simpan</button> 
                    <a href="../Home/cek_penggunaan.php?id=<?php echo $id; ?>">
                      <button type="button" class="btn btn-outline-primary">Cancel</button>
                  </a>

            </td>  
          </tr>		
        </table>
      </form>
      <?php 
      }
      ?>
    </div>
  </div>
</body>
</html>
