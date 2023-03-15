<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="css/script.js" defer></script>
    <link rel="stylesheet" href="style.css" />\
    <link rel="stylesheet" href="master.css">
    <title>TRANSACTION HISTORY</title>
    <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
.his{
    padding-top:100px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4a98f7;
  color: white;
}
</style>
</head>
<body>
<?php include('navbar.php'); ?>
<?php require("db_connect.php");?>



<div class="container his ">
<h1 class="text-center">PAYMENT HISTORY</h1>

<table id="customers">
  <tr>
    <th>S_NO</th>
    <th>PAYER</th>
    <th>PAYER_ACCOUNT</th>
    <th>RECEIVER</th>
    <th>RECEIVER_ACCOUNT</th>
    <th>AMOUNT</th>
    <th>TIME</th>
  </tr>
  <?php 

  $sql = "SELECT * FROM transfer_history" ;
  $result = $conn->query($sql);
 
  while($row = $result->fetch_assoc()) { 
    ?>
  <tr>
   <td><?php echo $row['s_no']; ?></td>
   <td><?php echo $row['payer']; ?></td>
   <td><?php echo $row['payer_acc']; ?></td>
   <td><?php echo $row['receiver']; ?></td>
   <td><?php echo $row['receiver_acc']; ?></td>
   <td><?php echo $row['amount']; ?></td>
   <td><?php echo $row['time']; ?></td>
  </tr>
  <?php
                }
                $conn->close();
                ?> 
</table>




</div>








<?php include('footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>