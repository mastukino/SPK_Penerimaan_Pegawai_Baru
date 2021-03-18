<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM sub_kriteria ORDER BY kode_sub_kriteria");

$namauser = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';
// Buat Koneksinya
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB1', 'kit');

$db1 = new mysqli(HOST, USER, PASS, DB1);

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan-sub-kriteria.doc");
?>



<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<div align="center">
		<h2>Data Sub Kriteria</h2>
	
		<table class="d" border="1"  >
	    	<thead>
	    		<tr style="background-color: green; color: white; text-align: right;">			<th>No</th>	
								<th>Kode Sub Kriteria</th>
                                <th>Kode Kriteria</th>
                                <th>Kode Lowongan</th>
                                <th>nama Sub kriteria</th>
                                <th>Nilai Altenatif</th>
	
	    		</tr>
	    	</thead>
	    	<tbody>
				<?php
			        $no = 1;
			        $query = "SELECT * FROM sub_kriteria";
			        $data1 = $db1->prepare($query);
			        $data1->execute();
			        $res1 = $data1->get_result();

			        if ($res1->num_rows > 0) {
				        while ($row = $res1->fetch_assoc()) {

				            $kode_sub_kriteria = $row['kode_sub_kriteria'];
				            $kode_kriteria = $row['kode_kriteria'];
				            $kode_lowongan = $row['kode_lowongan'];
				            $nama_sub_kriteria = $row['nama_sub_kriteria'];
				            $nilai_altenatif = $row['nilai_altenatif'];
							echo "<tr>";
								echo "<td>".$no++."</td>";
								echo "<td>".$kode_sub_kriteria."</td>";
								echo "<td>".$kode_kriteria."</td>";
								echo "<td>".$kode_lowongan."</td>";
								echo "<td>".$nama_sub_kriteria."</td>";
								echo "<td>".$nilai_altenatif."</td>";
					
								
		
								
											
								
							echo "</tr>";
			    	} } else { 
			    		echo "<tr>";
			    			echo "<td colspan='6'>Tidak ada data ditemukan</td>";
			    		echo "</tr>";
			     	}
			    ?>
	    	</tbody>
	    </table>

	
    </div>

</body>
</html>