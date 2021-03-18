<?php session_start();
include_once("../config.php");
$db_select = mysqli_query($koneksi, "SELECT * FROM lowongankerja ORDER BY kode_lowongan DESC");
 
$namauser = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';





?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="../../assets/img/favicon.png" rel="icon">
        <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <title>Dashboard | KIT</title>

        <style>
            .label1{
         font-size: 14px;
         font-weight: bold;
         text-shadow: 1px 1px 0px gray;
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

                    
                            <a class="nav-link collapsed" href="aturkriteria.php" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
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
                        <h1 class="mt-4">Dashboard</h1>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Semua Lamaran</div>
                               <p style="margin-left: 50px; font-size: 30px"> <?php
                                $result = mysqli_query($koneksi, "SELECT Count(id) as total FROM datapelamar ");
                                $hasil = mysqli_fetch_assoc($result);
                                $num_row = $hasil['total'];
                                echo $num_row;
                                ?></p>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                     Jumlah Lamaran</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Lowongan Kerja</div>
 									 <p style="margin-left: 50px; font-size: 30px"> <?php
                                $result = mysqli_query($koneksi, "SELECT Count(id) as total FROM lowongankerja ");
                                $hasil = mysqli_fetch_assoc($result);
                                $num_row = $hasil['total'];
                                echo $num_row;
                                ?></p>
          

                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                       Jumlah Lowongan Kerja
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Penilaian</div>
                                     <p style="margin-left: 50px; font-size: 30px"> <?php
                                $result = mysqli_query($koneksi, "SELECT Count(id) as total FROM Penilaian ");
                                $hasil = mysqli_fetch_assoc($result);
                                $num_row = $hasil['total'];
                                echo $num_row;
                                ?></p>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                       Jumlah Penilaian
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Interview</div>
                                    <p style="margin-left: 50px; font-size: 30px"> <?php
                                $result = mysqli_query($koneksi, "SELECT Count(id) as total FROM interview ");
                                $hasil = mysqli_fetch_assoc($result);
                                $num_row = $hasil['total'];
                                echo $num_row;
                                ?></p>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        Jumlah Interview
                                    </div>
                                </div>
                            </div>
                        </div>
                        


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-briefcase mr-1"></i>
                                Lowongan Kerja
                            </div>
                            <div class="card-body">


                                 <div class="table-responsive" >
                        <table class="table table-bordered " width="100%" cellspacing="0">
                            <!--kolom header table-->
                            <tr   class="text-center" >
                             
                                <th>Lowongan Kerja</th>
                                <th >Nama</th>
                                <th>Jumlah interview</th>
                             
                              
                            </tr>
                               
                                       <?php 



                            while($user_data = mysqli_fetch_array($db_select)) { 
                            
                                

                                $kode_lowongan = $user_data['kode_lowongan'];
                                $result = mysqli_query($koneksi, "SELECT Count(id) as total FROM datapelamar where kode_lowongan='$kode_lowongan' ");
                                $hasil = mysqli_fetch_assoc($result);
                                $jumlah_pelamar = $hasil['total'];
                               
                               
                                $nama_interview = $user_data['nama'];
                                $result = mysqli_query($koneksi, "SELECT Count(id) as total FROM interview where nama_lowongan='$nama_interview' ");
                                $hasil = mysqli_fetch_assoc($result);
                                $jumlah_interview = $hasil['total'];
                               
                                
            

                         
                                echo "<tr>";
                                echo "<td hidden>".$user_data['id']."</td>";
                                echo "<td> <h6>".$user_data['nama']."</h6> </td>";
                               
                                echo "<td> <h6>".$jumlah_pelamar."</h6> </td>";
                                echo "<td> <h6>".$jumlah_interview."</h6> </td>";

                                  
                            }
                            
                            ?>



                                    </table>
                                </div>
                            </div>
                        </div>






                        
                    </div>

                </main>
                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
