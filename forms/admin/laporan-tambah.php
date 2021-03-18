<?php
// include database connection file
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM laporan ORDER BY kode_laporan DESC");
 
$namauser = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';
 
 
?>

<?php

// KODE OTOMATIS
$query = "SELECT max(kode_laporan) as maxKode FROM laporan";
$hasil1 = mysqli_query($koneksi, $query);
$data  = mysqli_fetch_array($hasil1);
$kode_laporan = $data['maxKode'];
$noUrut = (int) substr($kode_laporan, 3, 3);
$noUrut++;
$char = "LP-";
$newID = $char . sprintf("%03s", $noUrut);
?>



<?php
$id = $_GET['id'];
$result2 = mysqli_query($koneksi, "SELECT * FROM interview WHERE id=$id");
 
while($data_penilaian = mysqli_fetch_array($result2))
{
  $kode_pelamar = $data_penilaian['kode_pelamar'];
  $kode_interview = $data_penilaian['kode_interview'];
  $nama_pelamar = $data_penilaian['nama'];
  $email = $data_penilaian['email'];
  $no_telpon = $data_penilaian['no_telpon'];
  $nama_lowongan = $data_penilaian['nama_lowongan'];
}
?>

<?php

$kode_pe = $kode_pelamar;
$result3 = mysqli_query($koneksi, "SELECT * FROM penilaian WHERE kode_pelamar='$kode_pe'");
 
while($data_pelamar = mysqli_fetch_array($result3))
{
  $hasil = $data_pelamar['hasil'];


}
?>



<?php

  
	    	    $kode_laporan = $newID;
            $kode_interview = $kode_interview;
            $kode_pelamar = $kode_pelamar;
            $nama_pelamar = $nama_pelamar;
           	$email = $email; 
            $no_telpon = $no_telpon; 
            $nama_lowongan = $nama_lowongan; 
            $hasil = $hasil; 
            $status = $_GET['status'];
           

		$cek_user=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM laporan WHERE kode_pelamar='$kode_pelamar'"));
		if ($cek_user > 0) {
			       echo '<script language="javascript">
			             alert ("Sudah Data Ada laporan");</script>';
                  header('Location: interview.php');
			             exit();
			}



  // update user status
      $id = $_GET['id'];
      $status = $_GET['status'];
  $result32 = mysqli_query($koneksi, "UPDATE interview SET status='$status' WHERE id=$id");
  






                
        $result = mysqli_query($koneksi, "INSERT INTO laporan(kode_laporan,kode_interview,kode_pelamar,nama,email,no_telpon,nama_lowongan,hasil,status) VALUES('$kode_laporan','$kode_interview','$kode_pelamar','$nama_pelamar','$email','$no_telpon','$nama_lowongan','$hasil','$status')");
            
           
            echo "<script>alert('Status berhasil diberubah')</script>";

              
       
        ?>
         <meta http-equiv="refresh" content="0;url=interview.php">