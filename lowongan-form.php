<?php session_start();
ob_start();
include_once("forms/config.php");
$result = mysqli_query($koneksi, "SELECT * FROM lowongankerja ORDER BY kode_lowongan DESC");

$result_datapelamar = mysqli_query($koneksi, "SELECT * FROM result_datapelamar ORDER BY kode_pelamar DESC"); 
$tanggal_lamaran = date('Y-m-d');

?>


<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM lowongankerja WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
  $kode_lowongan = $user_data['kode_lowongan'];
  $nama = $user_data['nama'];
  $deskripsi = $user_data['deskripsi'];
  $persyaratan = $user_data['persyaratan'];

}
?>


<?php

// KODE OTOMATIS
$query = "SELECT max(kode_pelamar) as maxKode FROM datapelamar";
$hasil = mysqli_query($koneksi, $query);
$data  = mysqli_fetch_array($hasil);
$kode_pelamar = $data['maxKode'];
$noUrut = (int) substr($kode_pelamar, 3, 3);
$noUrut++;
$char = "DP-";
$newID = $char . sprintf("%03s", $noUrut);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PT Kingslee Infinitas Teknologi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">


  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

       <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>PT Kingslee Infinitas Teknologi</span>
      </a>

       <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active " href="#header">Home</a></li>
          <li><a class="nav-link scrollto" href="about.html">About</a></li>
          <li><a class="nav-link scrollto" href="lowongan.php">Lowongan</a></li>
          <li><a class="getstarted scrollto" href="forms/login.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li><a href="lowongan.html">Lowongan</a></li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= lowongan Single Section ======= -->
    <section id="lowongan" class="lowongan">
      <div class="container" data-aos="fade-up">

        <div class="row">

      

            <article class="entry entry-single ">


                          <p class="text-center" style="font-weight: bold;font-size: 30px; text-transform: capitalize;" >Kirim Lamaran</p>
        
                          <p class="text-center" style="text-transform: capitalize; color:red; text-transform: capitalize;" >Anda melamar posisi 
                            <?php echo $nama;?></p>
                        <hr>
                            <!--kolom header table-->
              <div class="container " style="margin-left:150px;" >
                                
                  <form action="" method="post" name="form1" style="width: 500px;">
              
                    <table class="highlight"  >
                      <!--kolom isian table-->
                      <div class="form-group" >
                        <label>Nama Lengkap*</label>
                        <input type="text" class="form-control" name="nama" required maxlength="100">
                      </div><br>

                      <div class="form-group">
                        <label>Tanggal Lahir*</label>
                        <input class="form-control" type="date" name="tanggal_lahir" value="2000-01-01">              
                       </div><br>

                      <div class="form-group">
                        <label>Jenis Kelamin*</label>
                            <select class="form-control" name="jenis_kelamin">
                              <option>Laki-laki</option>
                              <option>Perempuan</option>
                            </select>   
                      </div><br>

                        <div class="form-group">
                        <label>Alamat*</label>
                        <textarea class="form-control" name="alamat"  rows="2" required maxlength="100"></textarea>
                      </div><br>

                      <div class="form-group">
                        <label>No Telpon*</label>
                        <input type="text" class="form-control" name="no_telpon" required maxlength="15" onkeypress="return event.charCode >= 48 && event.charCode <=57"  value="+62">
                      </div><br>

                      <div class="form-group">
                        <label>Email*</label>
                        <input type="text" class="form-control" name="email" required maxlength="50">
                      </div><br>

                      <div class="form-group">
                        <label>Link Website CV / Resume*</label>
                        <input type="text" class="form-control" name="link" required maxlength="1000" placeholder="e.g. Google Drive/ Linkedin/ Github/ Design Profile">
                      </div><br>


                    </table>

                    <tr>
                      <th>
                        <input type="submit" name="tambah" value="Selanjutnya" class="btn btn-primary" style="float: left; width: 120px;">
                      </th>&nbsp

                      <?php
                        echo "<td class='text-center'><a href='lowongan-detail.php?id=$_GET[id]'style='text-decoration:none; width:120px;' class='btn btn-danger' >
                                Kembali
                                </a></td>"
                        ?>
                    </tr>
             


                           </form>
                          </div>
                            
                       </div>
                                    


            </article><!-- End lowongan entry -->


            </div><!-- End sidebar -->

          </div><!-- End lowongan sidebar -->

        </div>

      </div>
    </section><!-- End lowongan Single Section -->

  </main><!-- End #main -->


   <?php
        

          // Check If form submitted, insert form data into users table.
          if(isset($_POST['tambah'])) {
            $kode_pelamar = $newID;
            $nama = $_POST['nama'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $alamat = $_POST['alamat'];
            $no_telpon = $_POST['no_telpon'];
            $email = $_POST['email'];
            $kode_lowongan = $kode_lowongan;
            $tanggal_lamaran = $tanggal_lamaran;
            $link = $_POST['link'];

           


      $cek_user=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM datapelamar WHERE kode_pelamar='$newID'"));
      if ($cek_user > 0) {
              echo '<script language="javascript">
                    alert ("Kode Sudah Ada Yang Menggunakan");</script>';
                    exit();
      }
        
            // include database connection file
            include_once("forms/config.php");
                
            // Insert user data into table
            $result = mysqli_query($koneksi, "INSERT INTO datapelamar(kode_pelamar,nama,tanggal_lahir,jenis_kelamin,alamat,no_telpon,email,kode_lowongan,tanggal_lamaran,link) VALUES('$kode_pelamar','$nama','$tanggal_lahir','$jenis_kelamin','$alamat','$no_telpon','$email','$kode_lowongan','$tanggal_lamaran','$link')");
            
           
            header("Location: penilaian-form.php?id=$_GET[id]&kode_pelamar=$kode_pelamar");
       
    
         
          }
        ?>


 <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="assets/img/logo.png" alt="">
              <span style="font-size: 25px">PT Kingslee Infinitas Teknologi</span>
            </a>
            
            <p>
              Lytech Home Center <br>
              Blok A no 6, bengkong sadai<br>
              Kepulauan Riau <br><br>
              <strong>Phone:</strong> (0778) 4081191<br>
              <strong>Email:</strong> ptkingsleeinfinitasteknologi@gmail.com<br>
            </p>

            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Menu</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="index.html">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="about.html">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="lowongan.php">Lowongan</a></li>
    
            </ul>
          </div>

        
          

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; 2021 <strong><span>PT Kingslee Infinitas Teknologi</span></strong>.
      </div>
      <div class="credits">
     
        
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>