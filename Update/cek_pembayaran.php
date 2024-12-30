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
      background-color: #c8eeeb;
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
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .btn-custom {
      font-size: 1rem;
      background-color: #007bff;
      color: #ffffff;
      border: none;
      padding: 8px 12px;
      border-radius: 5px;
      text-align: center;
      text-decoration: none;
      transition: background-color 0.3s ease;
      margin-left: 5px;
    }

    .btn-custom:hover {
      background-color: #0056b3;
      color: #ffffff;
    }

    .add-new-button {
      margin-left: auto;
      display: block;
    }
  </style>
</head>
<body>
  <div class="container-login100">
    <div class="container">
      <div class="table-title">
        <div>Update Payment</div>
        <!-- Add New Uses Button -->
        <a class="btn-custom add-new-button" href="../Home/index.php">Home</a>
      </div>

      <form method="post" action="../Sistem/update_status_pembayaran.php">
        <input type="hidden" name="id" value="<?php echo $d['id_penggunaan']; ?>">
        <table class="table">
          <tr>
            <th>ID. Payment</th>
            <th>ID. Customer</th>
            <th>ID. Uses</th>
            <th>Date Payment</th>
            <th>Total Payment</th>
            <th>Status Payment</th>
          </tr>
          <?php
  include '../Sistem/koneksi.php';
  $id = $_GET['id_penggunaan'];
  $id2 = $_GET['id_pelanggan'];

  // Fetch total_biaya for this id_penggunaan
  $biaya_query = mysqli_query($koneksi, "SELECT total_biaya FROM penggunaan WHERE id_penggunaan = '$id'");
  $biaya_data = mysqli_fetch_array($biaya_query);
  $total_biaya = $biaya_data['total_biaya'];

  // Fetch payment data from the pembayaran table
  $data = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_penggunaan = '$id' AND id_pelanggan = '$id2'");
  while($d = mysqli_fetch_array($data)){
?>
<tr>           
  <td><?php echo $d['id_pembayaran']; ?></td> 
  <td><?php echo $d['id_pelanggan']; ?></td> 
  <td><?php echo $d['id_penggunaan']; ?></td> 
  <td><?php echo $d['tanggal_pembayaran']; ?></td> 
  <td>Rp.<?php echo $total_biaya; ?></td> <!-- Display total_biaya as the total payment -->
  <td>
    <?php if ($d['status_pembayaran'] == 'Y') { ?>
      <!-- If status is 'Y', show a disabled button -->
      <button class="btn btn-secondary btn-sm" disabled>Paid</button>
    <?php } else { ?>
      <!-- If status is 'N', show a button to change to 'Y' -->
      <form action="../Sistem/update_status_pembayaran.php" method="POST" style="display:inline;">        
        <input type="hidden" name="id_pembayaran" value="<?php echo $d['id_pembayaran']; ?>">
        <input type="hidden" name="status_pembayaran" value="Y">
        <button type="submit" class="btn btn-success btn-sm">Mark as Paid</button>
      </form>
    <?php } ?>
  </td>  
</tr>
<?php } ?></table>
      </form>
    </div>
  </div>
</body>
</html>
