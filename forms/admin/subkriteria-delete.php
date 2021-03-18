<?php
// include database connection file
include_once("../config.php");
 
// Get id from URL to delete that user
$id = $_GET['id'];
 

 $result = mysqli_query($koneksi, "SELECT * FROM sub_kriteria WHERE id=$id");
while($user_data = mysqli_fetch_array($result))
{
  $kode_sub_kriteria = $user_data['kode_sub_kriteria'];


}
// Delete user row from table based on given id
$result = mysqli_query($koneksi, "DELETE FROM sub_kriteria WHERE id=$id");
$result2 = mysqli_query($koneksi, "DELETE FROM jawaban WHERE kode_sub_kriteria='$kode_sub_kriteria'");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location: subkriteria.php");
?>
