<!DOCTYPE html>
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
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 1;
}

.btn:hover {
  opacity: 1;
  background-color:rgb(16, 116, 199);
}
.form1{
    padding-top:100px;
}
</style>
</head>
<body>
<?php include('navbar.php'); ?>
<?php require("db_connect.php");


?>

<form action="result.php" style="max-width:500px;margin:auto" class="form1" method="post" name="myform" onsubmit="return validateForm()">
  <h2 class="text-center">TRANSACTION</h2>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="number" placeholder="Payee Account Number" name="receiver_id"  min=100 >
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="number" placeholder="Payer Account Number" name="payer_id"  min=100 value="<?php echo $row['s_no']; ?>">
  </div>
  
  <div class="input-container">
    <i class="fa fa-rupee icon"></i>
    <input class="input-field" type="number" placeholder="Enter Amount" name="amount" >
  </div>
  <input type= "hidden" name= "form_submitted" value="1">
          <input type="submit" class='btn'value="PAY">
  <!-- <button type="submit" class="btn">PAY</button> -->
</form>




<?php include('footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


<script>
    function validateForm() {
            var x = document.forms["myform"]["payer_id"].value;
            var y = document.forms["myform"]["receiver_id"].value;
            var z = document.forms["myform"]["amount"].value;
            var regex=/^[0-9]+$/;

            
            if (x == "" || y=="" || z=="") {
                alert("Fill it!!");
                return false;
            }

            var num = z>0?1:-1;
            if((Math.sign(z)==-1)||(Math.sign(z)==-0)||z==0){
                alert("Enter a valid amount to do transaction");
                return false;
            }
            if(isNaN(z)|| !x.match(regex)|| !y.match(regex) ||!z.match(regex)){
                alert("Enter correct input!");
                return false;
            }
            
           // var data = <?php //echo json_encode("42", JSON_HEX_TAG); ?>;
        }

    
</script>
</body>
</html>
