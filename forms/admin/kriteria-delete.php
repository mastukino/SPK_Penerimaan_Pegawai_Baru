<?php
// include database connection file
include_once("../config.php");
 
// Get id from URL to delete that user
$id = $_GET['id'];
 
// Delete user row from table based on given id


$result = mysqli_query($koneksi, "SELECT * FROM kriteria WHERE id=$id");
while($user_data = mysqli_fetch_array($result))
{
  $kode_kriteria = $user_data['kode_kriteria'];





}


$result = mysqli_query($koneksi, "DELETE FROM kriteria WHERE id=$id");
 $result1 = mysqli_query($koneksi, "DELETE FROM sub_kriteria WHERE kode_kriteria='$kode_kriteria'");
$result2 = mysqli_query($koneksi, "DELETE FROM jawaban WHERE kode_kriteria='$kode_kriteria'");
// After delete redirect to Home, so that latest user list will be displayed.
header("Location: kriteria.php");
?>
