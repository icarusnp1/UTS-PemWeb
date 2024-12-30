<html lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">

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
      position: relative;
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

    .table-title {
      font-size: 1.5rem;
      margin-bottom: 10px;
      font-weight: 500;
      color: #000000;
    }

    .btn-group-top {
      position: absolute;
      top: 10px;
      right: 10px;
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

    /* Keep action buttons inline with closer space */
    .btn-inline-group {
      display: inline-block;
      margin-right: 5px; /* Reduced margin to bring buttons closer */
    }
  </style>
</head>
<body>
  <div class="container-login100">
    <div class="container">

      <div class="table-title">Add Uses</div>
      
      <!-- Button Group Positioned in Upper Right -->
      <div class="btn-group-top">
      <?php 
include '../Sistem/koneksi.php';

// Check if 'id' is set and is valid
$id = isset($_GET['id']) ? $_GET['id'] : null; // Default to null if not set
// Only fetch data if 'id' is provided, or show a message if missing
if (!$id) {
    echo "ID is missing!";
    exit;
}
?>
        <a role="button" type="input"  class="btn-custom" href="../Update/tambah_penggunaan.php?id=<?php echo $id; ?>">Add new uses</a>
        <a href="user.php" class="btn-custom">Back</a>
      </div>
      
      <div class="mb-3">
        <table class="table">
          <tr>
              <th>ID. Uses</th>
              <th>Water volume per m3</th>
              <th>Total cost</th>
              <th>Date uses</th>
              <th>Actions</th>
          </tr>
<?php 
include '../Sistem/koneksi.php';

// Check if 'id' is set and is valid
$id = isset($_GET['id']) ? $_GET['id'] : null;
$id2 = $id;
// Only fetch data if 'id' is provided, or show a message if missing
if (!$id) {
    echo "ID is missing!";
    exit;
}

$data = mysqli_query($koneksi, "SELECT * FROM penggunaan");

while ($d = mysqli_fetch_array($data)) {
?>
    <tr>
        <td><?php echo $d['id_penggunaan']; ?></td>
        <td><?php echo $d['volume_air_m3']; ?>m³</td>
        <td>Rp.<?php echo $d['total_biaya']; ?></td> 
        <td><?php echo $d['tanggal_penggunaan']; ?></td> 
        <td>
            <!-- Inline action buttons with closer spacing -->
            <span class="btn-inline-group">
                <a role="button" class="btn btn-info btn-sm" href="../Update/cek_user.php?id=<?php echo $d['id_penggunaan']; ?>">Uses</a>
            </span>
          
            <span class="btn-inline-group">
                <form action="../Update/cek_pembayaran.php" method="get" style="display:inline;">
                    <input type="hidden" name="id_penggunaan" value="<?php echo $d['id_penggunaan']; ?>">
                    <input type="hidden" name="id_pelanggan" value="<?php echo $id2; ?>">
                    <button type="submit" class="btn btn-success btn-sm">History</button>
                </form>
            </span>
            <span class="btn-inline-group">
                <a role="button" class="btn btn-success btn-sm" href="../Update/update_payment.php?id=<?php echo $d['id_penggunaan']; ?>&id2=<?php echo $id2; ?>">Payment</a>
            </span>
        </td>                                      
    </tr>
<?php 
}
?>

        </table>
      </div>
    </div>
  </div>
</body>
</html>
