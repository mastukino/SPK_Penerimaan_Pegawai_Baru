<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM laporan ORDER BY kode_laporan");

$namauser = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';
// Buat Koneksinya
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB1', 'kit');

$db1 = new mysqli(HOST, USER, PASS, DB1);

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan.doc");
?>



<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<div align="center">
		<h2>Laporan</h2>
	
		<table class="d" border="1"  >
	    	<thead>
	    		<tr style="background-color: green; color: white; text-align: right;">			<th>No</th>	
                                <th>Kode Laporan</th>
                                <th>Kode Interview</th>
                                <th>Kode Pelamar</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Telpon</th>
                                <th>Nama Lowongan</th>
                                <th>Penilaian</th>
                                <th>Status</th>
	
	    		</tr>
	    	</thead>
	    	<tbody>
				<?php
			        $no = 1;
			        $query = "SELECT * FROM laporan";
			        $data1 = $db1->prepare($query);
			        $data1->execute();
			        $res1 = $data1->get_result();

			        if ($res1->num_rows > 0) {
				        while ($row = $res1->fetch_assoc()) {



				            $kode_laporan = $row['kode_laporan'];
				            $kode_interview = $row['kode_interview'];
				            $kode_pelamar = $row['kode_pelamar'];
				            $nama = $row['nama'];
				            $email = $row['email'];
				            $no_telpon = $row['no_telpon'];
				            $nama_lowongan = $row['nama_lowongan'];
				            $hasil = $row['hasil'];
				            $status = $row['status'];
				         

							echo "<tr>";
								echo "<td>".$no++."</td>";
								echo "<td>".$kode_laporan."</td>";
								echo "<td>".$kode_interview."</td>";
								echo "<td>".$kode_pelamar."</td>";
								echo "<td>".$nama."</td>";
								echo "<td>".$email."</td>";
								echo "<td>".$no_telpon."</td>";
								echo "<td>".$nama_lowongan."</td>";
								echo "<td>".$hasil."</td>";
								echo "<td>".$status."</td>";
					
								
		
								
											
								
							echo "</tr>";
			    	} } else { 
			    		echo "<tr>";
			    			echo "<td colspan='10'>Tidak ada data ditemukan</td>";
			    		echo "</tr>";
			     	}
			    ?>
	    	</tbody>
	    </table>

	
    </div>

</body>
</html>