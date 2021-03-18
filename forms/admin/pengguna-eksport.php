<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM Pengguna ORDER BY username");

$namauser = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';
// Buat Koneksinya
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB1', 'kit');

$db1 = new mysqli(HOST, USER, PASS, DB1);

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan-data-pengguna.doc");
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
								<th>username</th>
								<th>Nama Pengguna</th>
								<th>Email</th>
	
	    		</tr>
	    	</thead>
	    	<tbody>
				<?php
			        $no = 1;
			        $query = "SELECT * FROM pengguna";
			        $data1 = $db1->prepare($query);
			        $data1->execute();
			        $res1 = $data1->get_result();

			        if ($res1->num_rows > 0) {
				        while ($row = $res1->fetch_assoc()) {
				            $username = $row['username'];
				            $nama_pengguna = $row['nama_pengguna'];
				            $email = $row['email'];
							echo "<tr>";
								echo "<td>".$no++."</td>";
								echo "<td>".$username."</td>";
								echo "<td>".$nama_pengguna."</td>";
								echo "<td>".$email."</td>";
					
								
		
								
											
								
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