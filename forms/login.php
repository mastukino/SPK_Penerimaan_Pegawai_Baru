<?php
session_start();

$error = '';
if( isset($_SESSION['error']) ) {

  $error = $_SESSION['error']; 

  unset($_SESSION['error']);
} ?>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <title>KIT | LOGIN</title>

    <style>

      @media (min-width: 0px) {
          .kolom1{
          width: 0px ;
          height: 0PX;
        }
        .kolom2{
          width: 351px ;
          height: 450PX;
          margin-top: 30px ;
          background: #FFFFFF;
          overflow: hidden;
          border-radius: 10px 10px 10px 10px;
          padding-top: 30px;
          padding-left: 30px;
          padding-right: 30px;
          padding-bottom: 0px;
        }
         .label1{
         font-size: 18px;
         font-weight: bold;
         color:red;
         padding: 8px;
         margin-bottom: 15px;
         text-shadow: 1px 1px 0px gray;

       }
      .label2{
         font-size: 10px;
         font-weight: bold;
         color:#3B6284;
         margin-left:140px;
         display: flex;
         justify-content: center;
       }
       h1 {
        font-size: 20px;
      }   
      h2 {
        font-size: 18px;
        margin: 0 0 15px;
      }  
      .form-control, .btn {
        height: 36px;
        border-radius: 2px;
        width: 280px;
      }
    .btn {        
        font-size: 15px;
        font-weight: bold;
        background-color: #4154F1;
        border-color: #4154F1;
        color: white;
        
      }

    .BOX{
      box-shadow: 4px 4px rgba(179,211,241, 0.5);
    }
    .con
    {
      display: flex;
      justify-content: center;
    }

.hero{
    width: 100%;
 	height: 100vh;
 	background: url(../assets/img/hero-bg.png) top center no-repeat;
 	background-size: cover;
	}
.logo{
	height: 60px;
	display: block;
  margin-left: auto;
  margin-right: auto;
 

}
      }




      @media (min-width: 1200px) { 
      .label1{
         font-size: 18px;
         font-weight: bold;
         color:red;
         padding: 8px;
         margin-bottom: 15px;
         text-shadow: 1px 1px 0px gray;
      }
      .label2{
         font-size: 10px;
         font-weight: bold;
         color:#3B6284;
         margin-left:600px;
         display: flex;
         justify-content: center;
      }

      h1 {
        font-size: 20px;
      }   
      h2 {
        font-size: 18px;
        margin: 0 0 15px;
      }  

    .form-control, .btn {
        height: 36px;
        border-radius: 2px;
        width: 280px;
      }
    .btn {        
        font-size: 15px;
        font-weight: bold;
        background-color: #4154F1;
        border-color: #4154F1;
        color: white;
        
      }

    .BOX{
      box-shadow: 4px 4px rgba(179,211,241, 0.5);
    }
    .con
    {
      display: flex;
      justify-content: center;
    }
    .kolom1{
      width: 648px ;
      height: 580PX;
      margin-top: 30px;
      background: BLACK;
      margin-right: -15;
      overflow: hidden;
      border-radius: 10px 0px 0px 10px;
    }

    .kolom2{
      width: 351px ;
      height: 580PX;
      margin-top: 30px ;
      background: #FFFFFF;
      overflow: hidden;
      border-radius: 0px 10px 10px 0px;
      padding-top: 30px;
      padding-left: 30px;
      padding-right: 30px;
      padding-bottom: 0px;
    }
    .img{
      width:100%;
      height:100%;
      }
    }
</style>
  </head>


  <body class="hero">
  <form method="POST" action="check-login.php">



<div class="container con">
  <div class="row align-items-start">

    <div class="col">
      <div class=" kolom1 BOX" >
     <img src="../assets/img/bannerlogin.jpg" class="img-fluid img" alt="...">
    </div>
    </div>


    <div class="col">
    <div class="login-form kolom2 BOX" >
    	<img src="../assets/img/logo.png" class="logo"><br>
     <a href="../index.html"  style="text-decoration: none">  <span class="label1">PT Kingslee Infinitas Teknologi</span> </br></br></br></a>
     
        <h2><b><p style="color:#012970;">Login</p></b></h2> </br>     
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required="required">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required="required">
        </div>
        <div class="form-group clearfix">
            <button type="submit" class="btn btn-primary pull-left" value="masuk">Masuk</button>

        </div>     

              
         <p style="color: red; text-align: center;"> <?php echo $error;?></p>
    </form>
</div>
                                 

    </div>
  </div>
</div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <p class="label2">Copyright ©2021 PT Kingslee Infinitas Teknologi</p>
  </body>
</html>