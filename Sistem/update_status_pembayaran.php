<?php
include '../Sistem/koneksi.php';

// Get the posted values
$id_pembayaran = $_POST['id_pembayaran'];
$status_pembayaran = $_POST['status_pembayaran'];

// First, check the current status in the database
$query_check = "SELECT status_pembayaran FROM pembayaran WHERE id_pembayaran = '$id_pembayaran'";
$result_check = mysqli_query($koneksi, $query_check);
$row = mysqli_fetch_assoc($result_check);

// Only allow the status to change from 'N' to 'Y' (if it's already 'Y', don't allow changes)
if ($row['status_pembayaran'] == 'N' && $status_pembayaran === 'Y') {
    // Update the payment status to 'Y'
    $query = "UPDATE pembayaran SET status_pembayaran = '$status_pembayaran' WHERE id_pembayaran = '$id_pembayaran'";

    // Execute the query and check for errors
    if (mysqli_query($koneksi, $query)) {
        // Redirect to Update/cek_pembayaran.php after a successful update
        header("Location: ../Home/user.php");
        exit(); // Ensure no further code executes
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} elseif ($row['status_pembayaran'] == 'Y') {
    // If the status is already 'Y', show a message or prevent further changes
    echo "This payment is already marked as paid and cannot be changed back.";
} else {
    // If the status is neither 'Y' nor 'N', show an error
    echo "Invalid status value!";
}
?>
