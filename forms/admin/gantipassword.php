<?php
session_start();

$namauser = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';
$pass = ( isset($_SESSION['pass']) ) ? $_SESSION['pass'] : '';




$_SESSION["userId"] = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';
$conn = mysqli_connect("localhost", "root", "", "kit") or die("Connection Error: " . mysqli_error($conn));

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT * from pengguna WHERE username='" . $_SESSION["userId"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["password"]) {
        mysqli_query($conn, "UPDATE pengguna set password='" . $_POST["newPassword"] . "' WHERE username='" . $_SESSION["userId"] . "'");
        $message = "Password Berhasil diganti";
    } else
        $message = "Password Lama Salah!";
}
?>
 

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
        <title>Ganti Password | KIT</title>

        <style>
            .label1{
         font-size: 14px;
         font-weight: bold;
         text-shadow: 1px 1px 0px gray;
       }

		           .message {
		color: #FF0000;
		text-align: center;
		width: 100%;
		}
		.txtField {
		padding: 5px;
		border:#fedc4d 1px solid;
		border-radius:4px;
		}
		.required {
		color: #FF0000;
		font-size:11px;
		font-weight:italic;
		padding-left:10px;
		}

        </style>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>


        <script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "Password Baru & Konfirmasi Password Tidak Sama";
	output = false;
} 	
return output;
}
</script>

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
                        <h1 class="mt-4">Pengaturan</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-key mr-1"></i>
                               Ganti Password
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" style="overflow-x: hidden;">
                                    <table class="table table-bordered" width="100%" cellspacing="0" >
                                        <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">



                                    <div class="row">
                                     <div class="col-6"> 
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-5"><p class="text-right font-weight-bold">Password Lama</p></div>
                                                <div class="col-7"><input type="password" name="currentPassword" class="form-control" required="required">
												<span id="currentPassword" class="required"></span>
                                                </div>

                                            </div>
                                            <hr style="border-top: 2px solid #DCDCDC;">
                                            <div class="row" style="margin-bottom: 5px">
                                                <div class="col-5"><p class="text-right font-weight-bold">Password Baru</p></div>
                                                <div class="col-7"><input type="password" name="newPassword" class="form-control" required="required">
                                                <span id="newPassword" class="required"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-5"><p class="text-right font-weight-bold">Konfirmasi Password</p></div>
                                                <div class="col-7"><input type="password" name="confirmPassword" class="form-control" required="required">
                                                <span id="confirmPassword" class="required"></span>
                                                </div>
                                            </div>  

                                            <button type="submit" name="submit" class="btn btn-primary pull-left" style="float: right; margin:10px;  background-color: #4154F1; border-color: #4154F1;color: white;font-size: 15px; font-weight: bold;" value="submit">Simpan</button>

                                            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>


                                        </div>
                                        

                                     </div>



                                     <div class="col-6">
                                         <div class="row">
                                         <span class="border border-secondary" style="border-radius: 4px;max-width: 95%; min-height: 140px;">
                                          <p class="text-justify" style="margin:15px; padding: 15px;  font-size: 15px; ">Gunakan kombinasi huruf dan angka dan minimal 1 karakter khusus. Jangan gunakan nama, tanggal lahir, atau kata yang mudah di tebak. Penggantian password secara rutin sangat di sarankan.</p></div>
                                        </span>
                                        </div>

                                  

                                     
                                    </div>

                                      </div>
                                       </form>
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
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>


 
    </body>
</html>
