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

    // Directly set the 'id_pelanggan' to the value of '$id'
    $id_pelanggan = $id_penggunaan; // Assuming '$id' is passed as the 'id' in the URL

    // Insert the new record into the 'penggunaan' table
    $insert_query = "INSERT INTO penggunaan (id_penggunaan, id_pelanggan, volume_air_m3, total_biaya, tanggal_penggunaan)
                     VALUES ('$id_penggunaan', '$id_pelanggan', '$volume_air_m3', '$total_biaya', '$tanggal_penggunaan')";

    // Execute the query and check if the insert was successful
    if (mysqli_query($koneksi, $insert_query)) {
        header("Location: ../Home/user.php"); // Redirect after successful insert
        exit;
    } else {
        echo "Error inserting data: " . mysqli_error($koneksi);
    }
} else {
    // Fetch the 'id' from the query string
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if (!$id) {
        echo "ID is missing!";
        exit;
    }
}
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDAM</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
  <style>
    /* Styling for the page */
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden;
      font-family: Arial, sans-serif;
    }

    .container-login100 {
      background: linear-gradient(to bottom right, #ffffff, #0077b6);
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
      <div class="table-title">Add Uses</div>
      <div class="mb-3">
        <form method="post" action="">
          <table class="table">
            <tr>
              <td>ID Uses</td>
              <td>
                <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                <h><?php echo $id; ?></h>
              </td>
            </tr>
            <tr>      
              <td>Water volume m3</td>
              <td><input type="text" name="volume_air_m3" required></td>
            </tr>
            <tr>
              <td>Total cost</td>
              <td><input type="text" name="total_biaya" value="<?php echo isset($total_biaya) ? $total_biaya : ''; ?>" readonly></td>
            </tr>
            <tr>
              <td>Date active</td>
              <td><input type="date" name="tanggal_penggunaan" required></td>
            </tr>
            <tr>
              <td colspan="3">
                <button type="submit" class="btn btn-outline-primary">Save</button> 
                <a href="../Home/user.php"><button type="button" class="btn btn-outline-primary">Cancel</button></a>
              </td>
            </tr>    
          </table>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
