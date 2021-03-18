<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM sub_kriteria ORDER BY kode_sub_kriteria DESC");
 
$namauser = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';



$listlowongan = "SELECT * FROM lowongankerja ORDER BY id DESC";
$hasillistlowongan = mysqli_query($koneksi, $listlowongan);



$listkriteria = "SELECT * FROM kriteria";
$hasillistkriteria = mysqli_query($koneksi, $listkriteria);
?>
<?php
// include database connection file
include_once("../config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update



if(isset($_POST['update']))
{ 
  $id = $_POST['id'];
  $kode_sub_kriteria = $_POST['kode_sub_kriteria'];
  $kode_kriteria = $_POST['kode_kriteria'];
  $kode_lowongan=$_POST['kode_lowongan'];
  $nama_sub_kriteria=$_POST['nama_sub_kriteria'];
  $nilai_altenatif=$_POST['nilai_altenatif'];

    
   
  // update user data
  $result = mysqli_query($koneksi, "UPDATE sub_kriteria SET  kode_sub_kriteria='$kode_sub_kriteria',kode_kriteria='$kode_kriteria',kode_lowongan='$kode_lowongan',nama_sub_kriteria='$nama_sub_kriteria',nilai_altenatif='$nilai_altenatif' WHERE id=$id");
  
  echo "<script>alert('Data Berhasil diubah!')</script>";
  // Redirect to homepage to display updated user in list
  header("Location: subkriteria.php");
}
?>


<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM sub_kriteria WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
  $kode_sub_kriteria = $user_data['kode_sub_kriteria'];
  $kode_kriteria = $user_data['kode_kriteria'];
  $kode_lowongan=$user_data['kode_lowongan'];
  $nama_sub_kriteria=$user_data['nama_sub_kriteria'];
  $nilai_altenatif=$user_data['nilai_altenatif'];



}
?>
<?php

$kode = $kode_lowongan;
$datalowongan = mysqli_query($koneksi, "SELECT * FROM lowongankerja WHERE kode_lowongan='$kode'");
 
while($data_lowongan = mysqli_fetch_array($datalowongan))
{
  $kode_lowongan = $data_lowongan['kode_lowongan'];
  $nama_lowongan=$data_lowongan['nama'];
  
}
?>



<?php

$kode_k = $kode_kriteria;
$datakriteria = mysqli_query($koneksi, "SELECT * FROM kriteria WHERE kode_kriteria='$kode_k'");
 
while($data_kriteria = mysqli_fetch_array($datakriteria))
{
  $kode_kriteria = $data_kriteria['kode_kriteria'];
  $nama_kriteria=$data_kriteria['nama_kriteria'];
  
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>

         <link href="../../fonts/material.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="../../assets/img/favicon.png" rel="icon">
        <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <title>Sub Kriteria | KIT</title>

        <style>
            .label1{
         font-size: 14px;
         font-weight: bold;
         text-shadow: 1px 1px 0px gray;
       }
      .btncolor{
        background-color: red;

      }

         }
           /* label color */
           .e-input-field label {
             color: #000;
           }
           /* label focus color */
           .e-input-field input[type=text]:focus + label,.e-input-field input[type=password]:focus + label {
             color: #d32f2f !important;
           }
           /* label underline focus color */
           .e-input-field input[type=text]:focus,.e-input-field input[type=password]:focus {
             border-bottom: 1px solid #d32f2f !important;
             box-shadow: 0 1px 0 0 #d32f2f !important;
           }
           /* valid color */
           .e-input-field input[type=text].valid,.e-input-field input[type=password].valid {
             border-bottom: 1px solid #d32f2f !important;
             box-shadow: 0 1px 0 0 #d32f2f !important;
           }
           /* invalid color */
           .e-input-field input[type=text].invalid,.e-input-field input[type=password].invalid {
             border-bottom: 1px solid #d32f2f !important;
             box-shadow: 0 1px 0 0 #d32f2f !important;
           }
           /* icon prefix focus color */
           .e-input-field .prefix.active {
             color: #d32f2f !important;
           }
 

        </style>
       <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>

   <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"><span class="label1">PT Kingslee Infinitas Teknologi</span></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?php echo $namauser; ?>
                     </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="gantipassword.php"><i class="fa fa-key"></i> Ganti Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../Logout.php"><i class="fa  fa-share" aria-hidden="true"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="datapelamar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Data Pelamar
                            </a>

                            <a class="nav-link" href="lowongankerja.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                                Lowongan Kerja
                            </a>
                            <a class="nav-link" href="penilaian.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                                Penilaian
                            </a>
                            <a class="nav-link" href="interview.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                                Interview
                            </a>

                    
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                                Atur Kriteria
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    
                                    <a class="nav-link" href="kriteria.php"><i class="fa fa-bars" style="margin-right:10px"></i>Kriteria</a>
                                    <a class="nav-link" href="subkriteria.php"><i class="fa fa-tasks" style="margin-right:10px"></i>Sub Kriteria</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                                Pengaturan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">

                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Pengguna.php"><i class="fa fa-user" style="margin-right:10px"></i>Pengguna</a>
                                    
                                    <a class="nav-link" href="gantipassword.php"><i class="fa fa-key" style="margin-right:10px"></i>Ganti Password</a>
                                </nav>
                              
             
                            </div>


                            <a class="nav-link" href="laporan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Laporan
                            </a>
                             
                        </div>
                    </div>
                    
                </nav>
            </div>









            <div id="layoutSidenav_content">
                <main>
            <div class="container-fluid">
                        <h1 class="mt-4">Sub Kriteria</h1>
                <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-tasks mr-1"></i>Sub Kriteria</div>
                    <div class="card-body">
                        <div class="table-responsive">
                                    
                            <table class="table table-bordered" width="100%" cellspacing="0">











                  <!--content-->
    <main>
      <div class="row container">
     

          <!--table-->
        <form action="" method="post" name="form1">
         
            <table class="highlight">
              <!--kolom isian table-->
              <tr>
                    <th>Kode Sub Kriteria</th>
                    <th><input type="text" name="kode_sub_kriteria" readonly value=<?php echo $kode_sub_kriteria; ?>></th>
                  </tr>
            <tr> 
                  <td>Lowongan</td>
                    <td>
                      <select class="form-control" name="kode_lowongan" required >    
             
                      <option value="<?php echo $kode_lowongan;?>" ><?php echo $nama_lowongan; ?></option>                   

                     <?php while($data1 = mysqli_fetch_assoc($hasillistlowongan) ){?>

                      <option value="<?php echo $data1['kode_lowongan']; ?>" nama="tes" ><?php echo $data1['nama']; ?></option>

                     <?php } ?>

                    </select>
                    </td>
                  </tr>

        



                  <tr> 
                    <td>Kriteria</td>
                    <td>
                      <select class="form-control" name="kode_kriteria" required >    
                      <option value="<?php echo $kode_kriteria;?>" ><?php echo $nama_kriteria; ?></option>                   
                     <?php while($data2 = mysqli_fetch_assoc($hasillistkriteria) ){?>
                      <option value="<?php echo $data2['kode_kriteria']; ?>"><?php 
                      echo $data2['nama_kriteria']; 
                      ?></option>
                     <?php } ?>
                    </select>
                    </td>
                     </tr>
                  <tr> 
                    <td>Nama Sub Kriteria</td>
                    <td><textarea  rows="1"  type="text" name="nama_sub_kriteria" ><?php echo $nama_sub_kriteria;?></textarea></td>
                  </tr>
                  <tr> 
                    <td>Nilai Altenatif</td>
                    <td><input type="text" name="nilai_altenatif" value=<?php echo $nilai_altenatif;?>></td>
                  </tr>
                  <tr> 
                   <tr>
                      <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                    </tr>
                  </table>
                  <table>
                    <tr>
                      <th>
                        <input type="submit" name="update" value="Edit" class="right waves-effect waves-light btn blue darken-2" style="float: left;">
                      </th>
                      <th style="width: 1%;">
                        <a href="subkriteria.php"><input type="button" value="Kembali" class="right waves-effect waves-light btn red darken-2"></a> 
                      </th>
                    </tr>
                </table>

        </form>
      
      </div>
    </main>
        <!--end of content-->




		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

   <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){
        $('.collapsible').collapsible();
        $(".button-collapse").sideNav();
    });
  </script>
 
    </body>
</html>
