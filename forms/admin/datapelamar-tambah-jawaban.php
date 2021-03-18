<?php session_start();
ob_start();
include_once("../config.php");
$result = mysqli_query($koneksi, "SELECT * FROM lowongankerja ORDER BY kode_lowongan DESC");
$namauser = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';


$result_datapelamar = mysqli_query($koneksi, "SELECT * FROM result_datapelamar ORDER BY kode_pelamar DESC"); 
$tanggal_lamaran = date('Y-m-d');

?>


<?php
// Display selected user data based on id
// Getting id from url
$kl = $_GET['kode_lowongan'];
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM lowongankerja WHERE kode_lowongan='$kl'");
 
while($user_data = mysqli_fetch_array($result))
{
  $kode_lowongan = $user_data['kode_lowongan'];
  $nama_lowongan = $user_data['nama'];
  $deskripsi = $user_data['deskripsi'];
  $persyaratan = $user_data['persyaratan'];

}
?>

<?php
$kode_pelamar2 = $_GET['kode_pelamar'];


?>

<?php

// KODE OTOMATIS
$query = "SELECT max(kode_jawaban) as maxKode FROM jawaban";
$hasil = mysqli_query($koneksi, $query);
$data  = mysqli_fetch_array($hasil);
$kode_jawaban = $data['maxKode'];
$noUrut = (int) substr($kode_jawaban, 3, 3);
$noUrut++;
$char = "JA-";
$newID = $char . sprintf("%03s", $noUrut);
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

                            <a class="nav-link" href="datapelamar.php">
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
                            <div class="card-header"><i class="fas fa-file mr-1"></i>Data Pelamar Jawaban</div>
                    <div class="card-body">
                        <div class="table-responsive">
                                    
                            <table class="table table-bordered" width="100%" cellspacing="0">

<!--content-->
          <main>
            <div class="row container">
          <article class="entry entry-single ">


                          <p class="text-center" style="font-weight: bold;font-size: 30px; text-transform: capitalize;" >Pertanyaan</p>
        
                          <p class="text-center" style="text-transform: capitalize; color:red; text-transform: capitalize;" >Anda melamar posisi 
                            <?php echo $nama_lowongan;?></p>
                        <hr>
                            <!--kolom header table-->
              <div class="container " style="margin-left:150px;" >
                                
                  <form action="" method="post" name="form1" style="width: 500px;">

                    <table class="highlight"  >
                      <!--kolom isian table-->


                      


         
                       <?php 
                  
                       $kode_lowongan = $kode_lowongan;
                      $listkriteria = "SELECT * FROM kriteria WHERE kode_lowongan='$kode_lowongan' ";
                      $hasillistkriteria = mysqli_query($koneksi, $listkriteria);
                      ?>
                      
                
                      <?php
                       while($data1 = mysqli_fetch_assoc($hasillistkriteria) ){?>
                      <br>
                      <input type="text" hidden value="<?php echo $data1['kode_kriteria'];?>" name="nk[]" >
                        <?php echo $data1['nama_kriteria']; ?>

                  



                      <select class="form-control" required name="nsk[]"   >    
                      <option value="">Silahkan Pilih</option>                    
                      <?php 
                      $kode2 = $data1['kode_kriteria'];
                      $listsubkriteria = "SELECT * FROM sub_kriteria WHERE kode_kriteria='$kode2' ";
                      $hasillistsubkriteria= mysqli_query($koneksi, $listsubkriteria);
                      while($data2 = mysqli_fetch_assoc($hasillistsubkriteria) ){?>
                      <option value="<?php echo $data2['kode_sub_kriteria']; ?>"><?php echo $data2['nama_sub_kriteria']; ?>
                      </option>
                     <?php } ?>
                    </select>
                     <?php } ?>


                  

                     <br>
                    </table>

                    <tr>
                      <th>
                        <input type="submit" name="tambah" value="Selesai" class="btn btn-primary" style="float: left; width: 120px;">
                      </th>&nbsp


                      <?php
                        echo "<td class='text-center'><a href='datapelamar-tambah.php'style='text-decoration:none; width:120px;' class='btn btn-danger' >
                                Kembali
                                </a></td>"
                        ?>
                    </tr>
             


                           </form>
                          </div>
                            
                       </div>
                                    


            </article><!-- End lowongan entry -->

             


            </div>
          </main>
        <!--end of content-->

        <!-- Proses Penambahan Data User -->

        <?php
        

          // Check If form submitted, insert form data into users table.


          if(isset($_POST['tambah'])) {
            $kode_jawaban = $newID;
            $kode_pelamar = $kode_pelamar2;
            $kode_lowongan = $kode_lowongan;

          $a = $_POST['nk'];
          $b = $_POST['nsk'];
          $jml = count($a);
          for ($i=0; $i < $jml ; $i++) { 

            $result = mysqli_query($koneksi, "INSERT INTO jawaban(kode_jawaban,kode_pelamar,kode_lowongan,kode_kriteria,kode_sub_kriteria) VALUES('$kode_jawaban','$kode_pelamar','$kode_lowongan','$a[$i]','$b[$i]')");
          }


         
            // Insert user data into table
            
            
           
           
           
           header("Location: datapelamar.php");
            echo "<script>alert('Terima kasih Sudah Mengirimkan Lamaran')</script>";
          }
        ?>

        <!-- End -->


  </div>

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
