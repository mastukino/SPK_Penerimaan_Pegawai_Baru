<?php
// include database connection file
include_once("../config.php");

// Get id from URL to delete that user
$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM datapelamar WHERE id=$id");


 
while($user_data = mysqli_fetch_array($result))
{
  $kode_pelamar = $user_data['kode_pelamar'];





}


 
// Delete user row from table based on given id
$result = mysqli_query($koneksi, "DELETE FROM datapelamar WHERE id=$id");
$result1 = mysqli_query($koneksi, "DELETE FROM jawaban WHERE kode_pelamar='$kode_pelamar'");
$result2 = mysqli_query($koneksi, "DELETE FROM penilaian WHERE kode_pelamar='$kode_pelamar'");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location: datapelamar.php");
?>
