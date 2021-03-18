<?php session_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM datapelamar ORDER BY kode_pelamar DESC");
 
 $data_lowongan = mysqli_query($koneksi, "SELECT * FROM lowongankerja ORDER BY kode_lowongan DESC");
$namauser = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';
$tanggal_lamaran = date('Y-m-d');

$listlowongan = "SELECT * FROM lowongankerja";
$hasillistlowongan = mysqli_query($koneksi, $listlowongan);
?>



<?php

$kode_pelamar = $_GET['kode_pelamar'];
$result = mysqli_query($koneksi, "SELECT * FROM datapelamar WHERE kode_pelamar='$kode_pelamar'");
 
while($user_data = mysqli_fetch_array($result))
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

$kode = $kode_lowongan;
$datalowongan = mysqli_query($koneksi, "SELECT * FROM lowongankerja WHERE kode_lowongan='$kode'");
 
while($data_lowongan = mysqli_fetch_array($datalowongan))
{
  $kode_lowongan = $data_lowongan['kode_lowongan'];
  $nama_lowongan=$data_lowongan['nama'];
  
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
        <title>Data Pelamar | KIT</title>

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
                        <h1 class="mt-4">Data Pelamar</h1>
                <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-file mr-1"></i>Data Pelamar Detail</div>
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
                    <th>Kode Pelamar</th>
                    <th><input type="text" name="kode_pelamar" readonly value=<?php echo $kode_pelamar; ?>></th>
                  </tr>
                  <tr> 
                    <td>Nama Lengkap</td>
                    <td><input type="text" class="form-control" readonly name="nama" value=<?php echo $nama; ?> required maxlength="100"></td>
                  </tr>
                  <tr> 
                    <td>Tanggal Lahir</td>
                    <td><input class="form-control" type="date" readonly name="tanggal_lahir" value="<?php echo $tanggal_lahir;?>"></td>
                  </tr>
                  <tr> 
                    <tr> 
                    <td>Jenis Kelamin</td>
                    <td>
                        <select class="form-control" name="jenis_kelamin" readonly >
                     
                        <option><?php echo $jenis_kelamin; ?></option>
                     
                          ?>
                        </select>
                    </td>
                  </tr>
                  <tr> 
                    <td>Alamat</td>
                    <td><input type="text" class="form-control" readonly name="alamat" value=<?php echo $alamat; ?> required maxlength="100"></td>
                  </tr>
                  <tr> 
                    <td>No Telpon</td>
                    <td><input type="text" class="form-control" readonly name="no_telpon" value=<?php echo $no_telpon; ?> required maxlength="15"></td>
                  </tr>
                  <tr> 
                    <td>Email</td>
                    <td><input type="text" class="form-control" readonly name="email" value=<?php echo $email; ?> required maxlength="50"></td>
                  </tr>

                  <tr> 
                    <td>Link Website CV / Resume</td>
                    <td><a href="<?php echo $link; ?>" target="_blank"><input type="text" class="form-control" readonly name="link"  required maxlength="1000" placeholder="e.g. Google Drive/ Linkedin/ Github/ Design Profile " value=<?php echo $link; ?>></a></td>
                  </tr>

                    <tr> 
                    <td>Kode Lowongan</td>
                    <td><input type="text" class="form-control" readonly name="kode_lowongan" value=<?php echo $kode_lowongan; ?> required maxlength="50"></td>
                  </tr>                  
                  <td>Lowongan</td>
                    <td>
                      <select class="form-control" name="kode_lowongan" required >      
          
                    <option ><?php echo $nama_lowongan; ?></option>
          
                    </select>
                    </td>
                     <tr> 
                    <td>Tanggal Lamaran</td>
                    <td><input class="form-control" type="date" readonly name="tanggal_lamaran" value="<?php echo $tanggal_lamaran;?>"></td>
                  </tr>


                              <?php
                        echo "<td class='text-center'><a href='laporan-jawaban.php?kode_pelamar=$kode_pelamar'style='text-decoration:none; width:120px;' class='right waves-effect waves-light btn blue darken-2' >
                                Jawaban
                                </a></td>"
                        ?>

                  
                  </table>
                  <table>
                    <tr>
                      
                      <th style="width: 1%;">
                        <a href="laporan.php">
                          <input type="button" value="Tutup" class="right waves-effect waves-light btn red darken-2"></a> 
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
