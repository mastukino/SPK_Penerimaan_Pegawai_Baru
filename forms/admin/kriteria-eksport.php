<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM kriteria ORDER BY kode_kriteria");

$namauser = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';
// Buat Koneksinya
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB1', 'kit');

$db1 = new mysqli(HOST, USER, PASS, DB1);

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan-kriteria.doc");
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
                                <th>Kode Kriteria</th>
                                <th>Kode Lowongan</th>
                                <th>nama kriteria</th>
                                <th>bobot</th>
	
	    		</tr>
	    	</thead>
	    	<tbody>
				<?php
			        $no = 1;
			        $query = "SELECT * FROM kriteria";
			        $data1 = $db1->prepare($query);
			        $data1->execute();
			        $res1 = $data1->get_result();

			        if ($res1->num_rows > 0) {
				        while ($row = $res1->fetch_assoc()) {

				            $kode_kriteria = $row['kode_kriteria'];
				            $kode_lowongan = $row['kode_lowongan'];
				            $nama_sub_kriteria = $row['nama_kriteria'];
				            $bobot = $row['bobot'];
							echo "<tr>";
								echo "<td>".$no++."</td>";
								echo "<td>".$kode_kriteria."</td>";
								echo "<td>".$kode_lowongan."</td>";
								echo "<td>".$nama_sub_kriteria."</td>";
								echo "<td>".$bobot."</td>";
					
								
		
								
											
								
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