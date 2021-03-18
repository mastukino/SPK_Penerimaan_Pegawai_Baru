<?php
// include database connection file
include_once("../config.php");
 
// Get id from URL to delete that user
$id = $_GET['id'];
 
// Delete user row from table based on given id

// update user status
$kode_interview = $_GET['kode_interview'];
 $status = 'Proses Interview';
$result32 = mysqli_query($koneksi, "UPDATE interview SET status='$status' WHERE kode_interview='$kode_interview'");
$result = mysqli_query($koneksi, "DELETE FROM laporan WHERE id=$id");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location: laporan.php");
?>
