<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM datapelamar ORDER BY kode_pelamar");

$namauser = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';
// Buat Koneksinya
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB1', 'kit');

$db1 = new mysqli(HOST, USER, PASS, DB1);

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan-datapelamar.doc");
?>



<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<div align="center">
		<h2>Data Pengguna</h2>
	
		<table class="d" border="1"  >
	    	<thead>
	    		<tr style="background-color: green; color: white; text-align: right;">			<th>No</th>	
								<th>Kode Pelamar</th>
                                <th>Nama</th>
                                <th>tanggal_lahir</th>
                                <th>jenis_kelamin</th>
                                <th>alamat</th>
                                <th>no_telpon</th>
                                <th>email</th>
                                <th>kode_lowongan</th>
                                <th>tanggal_lamaran</th>
                                <th>link</th>
	
	    		</tr>
	    	</thead>
	    	<tbody>
				<?php
			        $no = 1;
			        $query = "SELECT * FROM datapelamar";
			        $data1 = $db1->prepare($query);
			        $data1->execute();
			        $res1 = $data1->get_result();

			        if ($res1->num_rows > 0) {
				        while ($row = $res1->fetch_assoc()) {
							$kode_pelamar = $row['kode_pelamar'];
							$nama=$row['nama'];
							$tanggal_lahir=$row['tanggal_lahir'];
							$jenis_kelamin=$row['jenis_kelamin']; 
							$alamat=$row['alamat']; 
							$no_telpon=$row['no_telpon']; 
							$email=$row['email']; 
							$kode_lowongan=$row['kode_lowongan']; 
							$tanggal_lamaran=$row['tanggal_lamaran']; 
							$link=$row['link'];  

							echo "<tr>";
								echo "<td>".$no++."</td>";
								echo "<td>".$kode_pelamar."</td>";
								echo "<td>".$nama."</td>";
								echo "<td>".$tanggal_lahir."</td>";
								echo "<td>".$jenis_kelamin."</td>";
								echo "<td>".$alamat."</td>";
								echo "<td>".$no_telpon."</td>";
								echo "<td>".$email."</td>";
								echo "<td>".$kode_lowongan."</td>";
								echo "<td>".$tanggal_lamaran."</td>";
								echo "<td>".$link."</td>";


			
								
		
								
											
								
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