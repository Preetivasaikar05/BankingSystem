<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> BANKING SYSTE</title>
    <!-- CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    

    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="css/script.js" defer></script>
    <link rel="stylesheet" href="style.css" />
 <link rel="stylesheet" href="master.css">

    <style>
      @media screen and (max-width: 600px) {
  .card {
    width: 350px;
   height:400px
  }

  body{
   
  }
}


      .container3{
       
        display: flex;
        
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width:100%;
        /* justify-content: space-between; */
      }
      .card-header{
        background-color:#4a98f7;
        color:white;
      }
      .card-header:hover{
        color:blue;
        transition:2s;
      }
    </style>
  </head>
  <body>
    
<?php include('navbar.php'); ?>
<?php require("db_connect.php");?>
<div class="container content">
<div class="row box1 my-6 container3 ">

<div class="card ">
  <div class="card-header">
    Transaction
  </div>
  <div class="card-body" >
    <h5 class="card-title">TRANSACTION PROCESS</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="transaction.php" class="btn btn-primary">PROCEED</a>
  </div>
</div>

<div class="card my-5">
  <div class="card-header">
   Transaction History
  </div>
  <div class="card-body">
    <h5 class="card-title">PAYMENT HISTORY</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="history.php" class="btn btn-primary">PROCEED</a>
  </div>
</div>


</div>




<?php include('footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  </body>
</html>








