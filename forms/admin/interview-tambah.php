<?php
// include database connection file
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM interview ORDER BY kode_interview DESC");
 
$namauser = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';
 
 
?>

<?php

// KODE OTOMATIS
$query = "SELECT max(kode_interview) as maxKode FROM interview";
$hasil1 = mysqli_query($koneksi, $query);
$data  = mysqli_fetch_array($hasil1);
$kode_interview = $data['maxKode'];
$noUrut = (int) substr($kode_interview, 3, 3);
$noUrut++;
$char = "IN-";
$newID = $char . sprintf("%03s", $noUrut);
?>



<?php
$id = $_GET['id'];
$result2 = mysqli_query($koneksi, "SELECT * FROM penilaian WHERE id=$id");
 
while($data_penilaian = mysqli_fetch_array($result2))
{
  $kode_pelamar = $data_penilaian['kode_pelamar'];
}

?>

<?php

$kode_pe = $kode_pelamar;
$result3 = mysqli_query($koneksi, "SELECT * FROM datapelamar WHERE kode_pelamar='$kode_pe'");
 
while($data_pelamar = mysqli_fetch_array($result3))
{
  $kode_pelamar = $data_pelamar['kode_pelamar'];
  $nama_pelamar = $data_pelamar['nama'];
  $email = $data_pelamar['email'];
  $no_telpon = $data_pelamar['no_telpon'];
  $kode_lowongan = $data_pelamar['kode_lowongan'];

}
?>


<?php
$kode_lo = $kode_lowongan;
$result4 = mysqli_query($koneksi, "SELECT * FROM lowongankerja WHERE kode_lowongan='$kode_lo'");
 
while($data_lowongan = mysqli_fetch_array($result4))
{

  $nama_lowongan = $data_lowongan['nama'];

}
?>





<?php
$tanggal_interview= date('Y-m-d');
$status = 'Proses Interview';


	    	$kode_interview = $newID;
            $kode_pelamar = $kode_pelamar;
            $nama_pelamar = $nama_pelamar;
           	$email = $email; 
            $no_telpon = $no_telpon; 
            $nama_lowongan = $nama_lowongan; 
            $tanggal_interview = $tanggal_interview; 
            $status = $status;
           

		$cek_user=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM interview WHERE kode_pelamar='$kode_pelamar'"));
		if ($cek_user > 0) {
			       echo '<script language="javascript">
			             alert ("Sudah Data Ada interview");</script>';
                  header('Location: penilaian.php');
			             exit();
			}



                
        $result = mysqli_query($koneksi, "INSERT INTO interview(kode_interview,kode_pelamar,nama,email,no_telpon,nama_lowongan,tanggal_interview,status) VALUES('$kode_interview','$kode_pelamar','$nama_pelamar','$email','$no_telpon','$nama_lowongan','$tanggal_interview','$status')");
            
           
            echo "<script>alert('Pemanggilan Interview')</script>";

              
       
        ?>



       <meta http-equiv="refresh" content="0;url=penilaian.php">




                  
    