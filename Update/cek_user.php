<?php
include '../Sistem/koneksi.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form values
    $id_penggunaan = $_POST['id']; // The ID from the hidden field
    $volume_air_m3 = $_POST['volume_air_m3'];
    $tanggal_penggunaan = $_POST['tanggal_penggunaan'];

    // Fetch the corresponding 'tarif' based on the volume_air_m3
    $tarif_query = mysqli_query($koneksi, "SELECT * FROM tarif WHERE batas_bawah <= '$volume_air_m3' AND batas_atas >= '$volume_air_m3' LIMIT 1");
    $tarif_data = mysqli_fetch_array($tarif_query);

    // If a valid tarif is found, calculate total_biaya
    if ($tarif_data) {
        $total_biaya = $tarif_data['tarif_per_m3'] * $volume_air_m3;
    } else {
        $total_biaya = 0; // Set to 0 if no tarif found
    }

    // Update the 'penggunaan' table with the new values
    $update_query = "UPDATE penggunaan 
                     SET volume_air_m3 = '$volume_air_m3', total_biaya = '$total_biaya', tanggal_penggunaan = '$tanggal_penggunaan' 
                     WHERE id_penggunaan = '$id_penggunaan'";

    if (mysqli_query($koneksi, $update_query)) {
        echo "Data updated successfully!";
        header("Location: ../Home/index.php"); // Redirect after successful update
        exit;
    } else {
        echo "Error updating data: " . mysqli_error($koneksi);
    }
}

// Fetch the record to update based on the 'id' passed in the URL
if (isset($_GET['id'])) {
    $id_penggunaan = $_GET['id'];
    $result = mysqli_query($koneksi, "SELECT * FROM penggunaan WHERE id_penggunaan = '$id_penggunaan' LIMIT 1");
    $d = mysqli_fetch_array($result);
    if (!$d) {
        echo "No data found for the provided ID!";
        exit;
    }
} else {
    echo "ID is missing!";
    exit;
}
?>

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
      <div class="table-title">Update Pricing</div>

      <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $d['id_penggunaan']; ?>">
        <table class="table"> 
          <tr>            
            <td>ID Penggunaan</td>
            <td><?php echo $d['id_penggunaan']; ?></td>
          </tr>
          <tr>
            <td>First water volume m3<br> Update water volume m3</td>
            <td><?php echo $d['volume_air_m3']; ?> m3<br> 
                <input type="text" name="volume_air_m3" value="<?php echo $d['volume_air_m3']; ?>" required> m3
            </td> 
          </tr> 
          <tr>
            <td>First total cost<br> Update total cost</td>
            <td>Rp.<?php echo $d['total_biaya']; ?><br>Rp.<input type="text" name="total_biaya" value="<?php echo $d['total_biaya']; ?>" readonly></td> 
          </tr>
          <tr>
            <td>First date use<br> Reset date use</td>
            <td>
              Tanggal: 
              <?php 
                  $formattedDate = DateTime::createFromFormat('Y-m-d', $d['tanggal_penggunaan'])->format('m-d-Y'); 
                  echo $formattedDate; 
              ?>
              <br>
              <input type="date" name="tanggal_penggunaan" value="<?php echo $d['tanggal_penggunaan']; ?>" required>
            </td>
          </tr>   
          
          <td colspan="3">
            <button type="submit" class="btn btn-outline-primary">Save</button> 
            <a href="../Home/index.php"><button type="button" class="btn btn-outline-primary">Cancel</button></a>
          </td>   
        </table>
      </form>
    </div>
  </div>
</body>
</html>
