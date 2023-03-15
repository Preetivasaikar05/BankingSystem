
<html>

<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="css/script.js" defer></script>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="master.css">
    <title>Transaction Page</title>
    <style>
    body {
               /* padding-top: 60px;
               font-size:25px; */
               background:  #f0faff;
               /* background: -webkit-linear-gradient(to right, #f5fce3, #e1e6d6 );
               background: linear-gradient(to right, #f5fce3,#e1e6d6); */
             
        }
    .center{padding-top:100px;
        /* background: #4a98f7; */
        /* background: -webkit-linear-gradient(to bottom,  #91c1c9, #5e9da8 );
        background: linear-gradient(to bottom, #91c1c9, #3a5f66); */
        /* padding-top:5px; */
        display: block;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
        width: 100%;    
    }
    .center2{
        font-size:15px;
        width:100%;
    }
    table {
    margin: 0 auto; /* or margin: 0 auto 0 auto */
  }
    td,th { border: 1px solid #ddd; padding: 8px;}
    #Table{ font-family: Arial,Helvetica, sans-serif; border-collapse: collapse;}
    #Table tr:nth-child(even){ background-color: #d2d3d4; }
    #Table tr:nth-child(odd){ background-color: #dee2e3; }
    #Table tr:hover{ background-color: #b5d0eb; }
    #Table th { padding-top: 12px; padding-bottom: 12px; text-align:left; background-color:  #608fb3; color:white; }

    </style>    
     <script type="text/javascript">
    
    if(window.history.replaceState){
        
        window.history.replaceState(null, null, window.location.href); 
    }
    
</script>
</head>
<!-- BODY-->
<body>
<!-- INCLUDING NAVBAR-->
<?php include('navbar.php'); 
require('db_connect.php');
?>

<!-- PHP CODE STARTS HERE-->
<!-- when user clicks proceed button then below code is executed-->
<?php 
  if(isset($_POST['form_submitted'])){

    //These variables are collecting form data
      $PAYER_ID = $_POST['payer_id'];
      $PAYEE_ID = $_POST['receiver_id'];
      $AMOUNT = $_POST['amount'];

      if(empty($PAYER_ID) || empty($PAYER_ID) || empty($AMOUNT)){
        //javascript code to notify user not to leave field blank         
        echo "<script> alert('Empty Fields !!');
        window.location.href='Transaction.php';
        </script>";  
        exit() ;           
      }

      //CHECK IF AMOUNT IS GREATER THAN 0 OR NOT
      if($AMOUNT <=0){
        echo "<script> alert('Amount must be greater than zero !!');
        window.location.href='transaction.php';
        </script>";  
        exit() ;  
      }

      if(!ctype_digit($AMOUNT) || !ctype_digit($PAYER_ID) || !ctype_digit($PAYEE_ID)){
        echo "<script> alert('Entered value can only contain digit!!');
        window.location.href='transaction.php';
        </script>";  
        exit() ;  
      }

      //CHECK IF PAYER ID EXISTS OR NOT
      $sqlcount = "SELECT COUNT(1) FROM customer where act_id='$PAYER_ID'";
      $r =  $conn->query($sqlcount);
      $d = $r->fetch_row();
      if($d[0]<1){
        echo "<script> alert('Payer ID does not exists !!');
        window.location.href='transaction.php';
        </script>";  
        exit() ;      
      }
    
      //CHECK IF PAYEE ID EXISTS OR NOT
      $sqlcount = "SELECT COUNT(1) FROM customer where act_id='$PAYEE_ID'";
      $r =  $conn->query($sqlcount);
      $d = $r->fetch_row();
      if($d[0]<1){
        echo "<script> alert('Payee ID does not exists !!');
        window.location.href='transaction.php';
        </script>";  
        exit() ;      
      }
      
      //CHECK IF PAYER HAS SUFFICIENT MONEY OR NOT
      $sql = "SELECT * from customer where act_id='$PAYER_ID'";       
          if($result = $conn->query($sql)){            
               $row1 = $result->fetch_array(); 
               if($row1['balance']<$AMOUNT){
                echo "<script> alert('Payer does not have required balance !!');
                window.location.href='transaction.php';
                </script>";  
                exit() ; 
                }  
          }  

   
      //THIS ELSE CODE BELOW IS PERFORMING TRANSACTION FROM PAYER AND PAYEE BANK ACCOUNTS
      //BELOW CODE RUNS WHEN ALL DETAILS ENTERED BY USER ARE CORRECT OR NOT

          echo "<div class ='center '>";
          echo "<div class ='center2'>";
          echo "<h1 style='text-align: center ;color:black'>Transaction Successfully Completed</h1>
                <p  style='text-align: center; font-size:25px; color:black'>Details of Payer and Receiver <p>
                <table id = 'Table'>
                <tr>
                <th></th>
                <th>Account No</th>
                <th>Name</th>
                <th>Email</th>
               
                </tr>";

          //SELECTING PAYER DETAILS FROM ACCOUNTDETAILS TABLE
          $sql = "SELECT * from customer where act_id='$PAYER_ID'";       
          if($result = $conn->query($sql)){            
               $row1 = $result->fetch_array(); 
                //row1 contains payer details
                       echo "<tr> 
                            <td style='background-color:#608fb3;color:white;'> Payer </td>
                            <td>".$row1['act_id']."</td>
                            <td>".$row1['name']."</td>
                            <td>".$row1['email']."</td>
                           
                            </tr>";                        
                       $PayerCurrentBalance = $row1['balance'];            
            }
        
          //SELECTING PAYEE DETAILS FROM ACCOUNTDETAILS TABLE
          $sql2 = "SELECT * from customer where act_id='$PAYEE_ID'";
          if($result = $conn->query($sql2)){
                //row2 contains payee details
                $row2 = $result->fetch_array();
                       echo "<tr> 
                            <td style='background-color:#608fb3;color:white;'> Receiver </td>
                            <td>".$row2['act_id']."</td>
                            <td>".$row2['name']."</td>
                            <td>".$row2['email']."</td>
                           
                            </tr>"; 
                        $PayeeCurrentBalance = $row2['balance'];                       
               
               
            }               
            echo "</table>";
            $PayeeCurrentBalance += $AMOUNT;
            $PayerCurrentBalance -= $AMOUNT;
            echo "<br>";
            echo "<table id = 'Table' style='margin-bottom:15px;'>
                    <tr>
                        <th></th>
                        <th>Old Balance</th>
                        <th>New Balance</th>
                    </tr>
                    <tr>
                        <th>Payer</th>
                        <td style='color:black'>".$row1['balance']."</td>                        
                        <td style='color:black'>".$PayerCurrentBalance."</td>
                    </tr>
                    <tr>
                        <th>Receiver</th>
                        <td style='color:black'>".$row2['balance']."</td>                        
                        <td style='color:black'>".$PayeeCurrentBalance."</td>
                    </tr>";
            echo "</table>";
           

           //FOR UPDATING DETAILS OF PAYER
           $updatepayer ="UPDATE customer set balance='$PayerCurrentBalance' where act_id='$PAYER_ID'";
           //FOR UPDATING DETAILS OF PAYEE
           $updatepayee ="UPDATE customer set balance='$PayeeCurrentBalance' where act_id='$PAYEE_ID'";

           //CHECK IF PAYER DETAILS ARE UPADTED OR NOT 
           if($conn->query($updatepayer)==true){
                ?>         
                <script>console.log("PAYER DETAILS UPDATED!!")</script>
                <?php
           }
           else{
                ?>        
                <script>alert("PAYER DETAILS NOT UPDATED!!")</script>
                <?php
           }

           //CHECK IF PAYEE DETAILS ARE UPADTED OR NOT 
           if($conn->query($updatepayee)==true){
                    ?>         
                    <script>console.log("PAYEE DETAILS UPDATED! ")</script>
                    <?php
            }
            else{
                    ?>        
                    <script>alert("PAYEE DETAILS NOT UPDATED! ERROR OCCURED!")</script>
                    <?php
            }

            //SETTING TIME ZONE
            date_default_timezone_set('Asia/Kolkata');           
            $date = date('Y-m-d H:i:s',time());
            //echo "Current time is : ".$date;

            //FOR UPDATING HISTORY TABLE WHICH MAINTAINS RECORDS OF ALL TRANSACTIONS
            $InsertTransactTable ="Insert into transfer_history (payer, payer_acc, receiver	, receiver_acc, amount, time) values ('$row1[name]','$row1[act_id]','$row2[name]','$row2[act_id]','$AMOUNT','$date')";
            //EXECUTING INSERT COMMAND AND CHECKING IF INSERTION WAS SUCCESSULL OR NOT
            if($conn->query($InsertTransactTable)==true){
                    ?>         
                    <script>console.log("Record of this transaction saved! ")</script>
                    <?php
            }
            else{
                    ?>        
                    <script>alert("Record of this transaction saved! ERROR OCCURED!")</script>
                    <?php
            }


            echo "<br>";
        echo "</div>";
        echo "</div>";
   
    
  }else{
      ?>
      <h1>All transactions are up to date</h1>
      <?php
  }

  $conn->close();

?>
 
             

   
<?php include('footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      

</body>
</html>