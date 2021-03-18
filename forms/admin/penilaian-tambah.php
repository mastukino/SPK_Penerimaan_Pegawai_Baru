<?php
// include database connection file
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM penilaian ORDER BY kode_penilaian DESC");
 
$namauser = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';
 
 
?>

<?php

$id = $_GET['id'];
$result2 = mysqli_query($koneksi, "SELECT * FROM datapelamar WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result2))
{
  $kode_pelamar = $user_data['kode_pelamar'];
  $nama=$user_data['nama'];
  $tanggal_lahir=$user_data['tanggal_lahir'];
  $jenis_kelamin=$user_data['jenis_kelamin']; 
  $alamat=$user_data['alamat']; 
  $no_telpon=$user_data['no_telpon']; 
  $email=$user_data['email']; 
  $kode_lowongan=$user_data['kode_lowongan']; 
  $tanggal_lamaran=$user_data['tanggal_lamaran']; 
  $link=$user_data['link'];  

}
?>

<?php

// KODE OTOMATIS
$query = "SELECT max(kode_penilaian) as maxKode FROM penilaian";
$hasil1 = mysqli_query($koneksi, $query);
$data  = mysqli_fetch_array($hasil1);
$kode_penilaian = $data['maxKode'];
$noUrut = (int) substr($kode_penilaian, 3, 3);
$noUrut++;
$char = "PE-";
$newID = $char . sprintf("%03s", $noUrut);
?>

<?php 

                             $i = 0;
                            $result = mysqli_query($koneksi, "SELECT * FROM jawaban where kode_pelamar='$kode_pelamar'");
                            while($user_data = mysqli_fetch_array($result)) { 
                            //select data bobot kriteria
                            $kk = $user_data['kode_kriteria'];
                            $datakriteria = mysqli_query($koneksi, "SELECT * FROM kriteria WHERE kode_kriteria='$kk'");
                             
                            while($data_kriteria = mysqli_fetch_array($datakriteria))
                            { 
                              $bobot=$data_kriteria['bobot'];  
                            }
                            // end data bobot kriteria

                            //select data Nilai Alternatif sub kriteria
                            $ksk = $user_data['kode_sub_kriteria'];
                            $datasubkriteria = mysqli_query($koneksi, "SELECT * FROM sub_kriteria WHERE kode_sub_kriteria='$ksk'");
                             
                            while($data_sub_kriteria = mysqli_fetch_array($datasubkriteria))
                            { 
                              $nilai_altenatif=$data_sub_kriteria['nilai_altenatif'];  
                            }
                            // end data Nilai Alternatif sub kriteria

                                $i++;
                                $hasilpangkat = pow($nilai_altenatif,$bobot);
                                $hasil2[$i] = $hasilpangkat; 

                            }

                            $hasilsum = array_sum($hasil2); 
                            ?>


<?php
	    	$kode_penilaian = $newID;
            $kode_pelamar = $kode_pelamar;
            $nama=$nama;
           	$tanggal_lamaran=$tanggal_lamaran; 
            $kode_lowongan=$kode_lowongan; 
            $hasil = $hasilsum;
           



      

		$cek_user=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM penilaian WHERE kode_pelamar='$kode_pelamar'"));
		if ($cek_user > 0) {
			       echo '<script language="javascript">
			             alert ("Sudah Data Ada Penilaian");</script>';
                  header('Location: datapelamar.php');
			             exit();
			}

      $cek_jawaban=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM jawaban WHERE kode_pelamar='$kode_pelamar'"));
    if ($cek_jawaban == 0) {
             echo '<script language="javascript">
                   alert ("Tidak ada jawaban");</script>';
                  header('Location: datapelamar.php');
                   exit();
      }


                
     
           $result = mysqli_query($koneksi, "INSERT INTO penilaian(kode_penilaian,kode_pelamar,nama,tanggal_lamaran,kode_lowongan,hasil) VALUES('$kode_penilaian','$kode_pelamar','$nama','$tanggal_lamaran','$kode_lowongan',$hasil)");
            
           
            echo "<script>alert('Tambah Daftar Penilaian Berhasil')</script>";

   
              
       
        ?>

        <meta http-equiv="refresh" content="0;url=datapelamar.php">

                            
                  
                       
    