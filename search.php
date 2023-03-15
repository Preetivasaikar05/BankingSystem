<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">

    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="css/script.js" defer></script>
    <link rel="stylesheet" href="css/style.css" />
 <link rel="stylesheet" href="css/master.css">

</head>
<body>
<?php include('navbar.php'); ?>
<?php require("db_connect.php");?>
  
<?php 
      $noresults = true;
        $query = $_GET["search"];
    
        $sql = "SELECT * from customer where match (name, email) against ('$query')"; 
        $result = mysqli_query($conn, $sql);
        echo '<h4>SEARCHING RESULT FOR : '.$query.'</h4>';
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['name'];
            $email = $row['email']; 
        
      
          $url = "customers.php?c_id=". $row['s_no'] ;
   
            $noresults = false; 
          echo'<div class="jumbotron jumbotron-fluid text-center my-5">
           <div class="container"> 
           <h1>'. $title. '</h1>
             <p>'. $email .'</p></p>
             <a href="'.$url.'"><button class="btn btn-primary">Proceed</button></a>
           </div>
         </div>';
           
           
                }
        if ($noresults){
            echo '<div class="jumbotron jumbotron-fluid text-center my-5">
                    <div class="container">
                        <p class="display-4">No Results Found</p>
                        <p class="lead"> Suggestions: <ul>
                                <li>Make sure that all words are spelled correctly.</li>
                                <li>Customer not there in database.</li>
                                <li>Try again </li></ul>
                        </p>
                    </div>
                 </div>';
        }        
    ?>


















<?php include('footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>