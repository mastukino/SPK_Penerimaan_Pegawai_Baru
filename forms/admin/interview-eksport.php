<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM interview ORDER BY kode_interview");

$namauser = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';
// Buat Koneksinya
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB1', 'kit');

$db1 = new mysqli(HOST, USER, PASS, DB1);

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan-data-interview.doc");
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
								<th>Kode Interview</th>
								<th>Kode Pelamar</th>
								<th>Nama</th>
								<th>Email</th>
								<th>No Telpon</th>
								<th>Nama Lowongan</th>
								<th>Tanggal Interview</th>
								<th>Status</th>

	
	    		</tr>
	    	</thead>
	    	<tbody>
				<?php
			        $no = 1;
			        $query = "SELECT * FROM interview";
			        $data1 = $db1->prepare($query);
			        $data1->execute();
			        $res1 = $data1->get_result();

			        if ($res1->num_rows > 0) {
				        while ($row = $res1->fetch_assoc()) {
				        	$kode_interview = $row['kode_interview'];
				            $kode_pelamar = $row['kode_pelamar'];
				            $nama = $row['nama'];
				            $email = $row['email'];
				            $no_telpon = $row['no_telpon'];
				            $nama_lowongan = $row['nama_lowongan'];
				            $tanggal_interview = $row['tanggal_interview'];
				            $status = $row['status'];
				 
							echo "<tr>";
								echo "<td>".$no++."</td>";
								echo "<td>".$kode_interview."</td>";
								echo "<td>".$kode_pelamar."</td>";
								echo "<td>".$nama."</td>";
								echo "<td>".$email."</td>";
								echo "<td>".$no_telpon."</td>";
								echo "<td>".$nama_lowongan."</td>";
								echo "<td>".$tanggal_interview."</td>";
								echo "<td>".$status."</td>";
					
								
		
								
											
								
							echo "</tr>";
			    	} } else { 
			    		echo "<tr>";
			    			echo "<td colspan='8'>Tidak ada data ditemukan</td>";
			    		echo "</tr>";
			     	}
			    ?>
	    	</tbody>
	    </table>

	
    </div>

</body>
</html>