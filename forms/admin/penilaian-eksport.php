<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM penilaian ORDER BY kode_penilaian");

$namauser = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';
// Buat Koneksinya
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB1', 'kit');

$db1 = new mysqli(HOST, USER, PASS, DB1);

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan-data-penilaian.doc");
?>



<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<div align="center">
		<h2>Data Penilaian</h2>
	
		<table class="d" border="1"  >
	    	<thead>
	    		<tr style="background-color: green; color: white; text-align: right;">			<th>No</th>	
								<th>Kode Penilaian</th>
								<th>Kode Pelamar</th>
								<th>Nama</th>
								<th>Tanggal Lamaran</th>
								<th>Kode Lowongan</th>
								<th>Hasil</th>

	
	    		</tr>
	    	</thead>
	    	<tbody>
				<?php
			        $no = 1;
			        $query = "SELECT * FROM penilaian";
			        $data1 = $db1->prepare($query);
			        $data1->execute();
			        $res1 = $data1->get_result();

			        if ($res1->num_rows > 0) {
				        while ($row = $res1->fetch_assoc()) {
				        	$kode_penilaian = $row['kode_penilaian'];
				            $kode_pelamar = $row['kode_pelamar'];
				            $nama = $row['nama'];
				            $tanggal_lamaran = $row['tanggal_lamaran'];
				            $kode_lowongan = $row['kode_lowongan'];
				            $hasil = $row['hasil'];
							echo "<tr>";
								echo "<td>".$no++."</td>";
								echo "<td>".$kode_penilaian."</td>";
								echo "<td>".$kode_pelamar."</td>";
								echo "<td>".$nama."</td>";
								echo "<td>".$tanggal_lamaran."</td>";
								echo "<td>".$kode_lowongan."</td>";
								echo "<td>".$hasil."</td>";
					
								
		
								
											
								
							echo "</tr>";
			    	} } else { 
			    		echo "<tr>";
			    			echo "<td colspan='5'>Tidak ada data ditemukan</td>";
			    		echo "</tr>";
			     	}
			    ?>
	    	</tbody>
	    </table>

	
    </div>

</body>
</html>