<?php session_start();
include_once("../config.php");
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$result = mysqli_query($koneksi, "SELECT * FROM datapelamar ORDER BY kode_pelamar DESC");

$namauser = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';
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
                            <div class="card-header"><i class="fas fa-file mr-1"></i>Data Pelamar</div>
                    <div class="card-body">
                        <div class="table-responsive">
                                    
                            <table class="table table-bordered" width="100%" cellspacing="0">











                   <!--content-->
      
             <div class="row container">

               
                        <form name="cari" method="post" action="datapelamar-cari.php" class="row">
                            <div class="col-2">
                                <input type="text" name="cari" placeholder="Seacrh..." class="validate" required title="cari">
                            </div>

                            <div class="col-1">
                                <input type="submit" name="cari2" value="cari" class="btn"> 
                            </div>
                            <div class="col-1">
                                <a href='datapelamar.php' class="btn red">Kembali<i class="material-icons right"></i></a>
                            </div>
                         </form>

                            <div class="col-8"><div class="float-right">
                                <a href='datapelamar-eksport.php' class="waves-effect waves-light btn blue darken-2">Export</a>
                                <a href='datapelamar-tambah.php' class="btn btn-dark ">Tambah Baru</a>
                                 <a href='datapelamar.php' class="waves-effect waves-light btn blue darken-2">Refresh<i class="material-icons right"></i></a>
                                </div>
                            </div>
                        
                
            </div>



                   

                    <!--table-->
                   
                       <div class="table-responsive" >
                        <table class="table table-bordered " width="100%" cellspacing="0">
                            <!--kolom header table-->
                            <?php 


                          if(isset($_POST['cari2'])){

                          echo "
                                <tr class='text-center'>
                                <th hidden>ID</th>
                                <th>Kode Pelamar</th>
                                <th>Nama</th>
                                <th hidden>tanggal_lahir</th>
                                <th hidden>jenis_kelamin</th>
                                <th hidden>alamat</th>
                                <th hidden>no_telpon</th>
                                <th hidden>email</th>
                                <th hidden>kode_lowongan</th>
                                <th >Lowongan</th>
                                <th >tanggal_lamaran</th>
                                <th hidden>link</th>
                                <th>&nbsp&nbsp&nbsp&nbspAksi&nbsp&nbsp&nbsp&nbsp&nbsp</th>
                          </tr>
                              ";

                          $cari = $_POST['cari'];
                          $pnjng = 100;
                          $substr = substr($cari, 0, $pnjng).' ...';
                          $sql = "SELECT * FROM datapelamar WHERE id LIKE '%$cari%' OR kode_pelamar LIKE '%$cari%' OR nama LIKE '%$cari%' OR jenis_kelamin LIKE '%$cari%' OR alamat LIKE '%$cari%' OR no_telpon LIKE '%$cari%' OR email LIKE '%$cari%'OR kode_lowongan LIKE '%$cari%' OR tanggal_lamaran LIKE '%$cari%'";
                          $query = mysqli_query($conn,$sql);
                       
                           if ($query->num_rows > 0) {
                            while($data = mysqli_fetch_array($query)){
                              $test = $data['kode_pelamar'];


                              //select data nama lowongan
                            $kode = $data['kode_lowongan'];
                            $datalowongan = mysqli_query($koneksi, "SELECT * FROM lowongankerja WHERE kode_lowongan='$kode'");
                             
                            while($data_lowongan = mysqli_fetch_array($datalowongan))
                            {
                              $kode_lowongan = $data_lowongan['kode_lowongan'];
                              $nama_lowongan=$data_lowongan['nama'];
                              
                            }


                      
                              echo "<tr>";
                              echo "<td hidden>".$data['id']."</td>";
                                echo "<td> <h6> 
                                <a href='datapelamar-detail.php?id=$data[id]' style='text-decoration: none;'>

                                ".$data['kode_pelamar']."</a></h6></td>";
                                echo "<td> <h6>".$data['nama']."</h6> </td>";
                                echo "<td hidden> <h6>".$data['tanggal_lahir']."</h6> </td>";
                                echo "<td hidden> <h6>".$data['jenis_kelamin']."</h6> </td>";
                                echo "<td hidden class='text-justify'><h6>".$data['alamat']."</h6></td>"; 
                                echo "<td hidden> <h6>".$data['no_telpon']."</h6> </td>";
                                echo "<td hidden> <h6>".$data['email']."</h6> </td>";
                                echo "<td hidden> <h6>".$data['kode_lowongan']."</h6> </td>";
                                echo "<td> <h6>".$data['kode_lowongan']." - ".$nama_lowongan."</h6> </td>";  
                                echo "<td > <h6>".$data['tanggal_lamaran']."</h6> </td>";
                                echo "<td hidden> <h6>".$data['link']."</h6> </td>"; 
                              echo "<td class='text-center'>  <a href='datapelamar-edit.php?id=$data[id]' style='text-decoration: none;'><i class='material-icons' title='Edit $test'>mode_edit</i></a> | <a data-id='1' class='hapus' href='datapelamar-delete.php?id=$data[id]' style='text-decoration: none;'><i class='material-icons' title='Hapus $test'>delete</i></a>";
                              echo "<tr>";
                             } } 



                             else{ 

                              
                              echo "<tr><td colspan='5'><center><h6><b>'$substr'</b> Tidak Ditemukan. Silahkan Periksa Kembali Keyword Anda</h6></center></td></tr>";}
                          }
                      ?>
                            
                       
                          </table>
                                    
                                  </table>
                                 </div>
                        </div>
                        </div>
               </div>
          </div>

        </main>
    </div>

        <!--end of content-->




		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../js/materialize.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $('.collapsible').collapsible();
            $(".button-collapse").sideNav();
        });
    </script>
    <script>
        $(".hapus").click(function () {
        var jawab = confirm("Anda Yakin Ingin Menghapus data ?");
        if (jawab === true) {
        // konfirmasi
            var hapus = false;
            if (!hapus) {
                hapus = true;
                $.post('delete.php', {id: $(this).attr('data-id')},
                function (data) {
                    alert(data);
                });
                hapus = false;
            }
        } else {
            return false;
        }
        });
      </script>
 
    </body>
</html>
