<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact</title>
    <!-- CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    

    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="master.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}
body {
  background-image: url("https://img.freepik.com/free-vector/light-blue-cubic-blank-background-vector-business_53876-136708.jpg?w=2000");
  background-size: cover; 
 }

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=email], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color:;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: ;
}

.container {
  border-radius: 5px;
  background-color: #f0faff;
  padding: 20px;
}
.io{
    padding-top:100px;
}
</style>
</head>
<body>
<?php include('navbar.php'); 
require('db_connect.php');
?>

<h3 class="text-center my-2 io">Contact</h3>

<div class="container my-1">
  <form action="#">
    <label for="fname"> Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

    <label for="lname">Email</label>
    <input type="email"id="lname" name="lastname" placeholder="Your last name.." required>


    <label for="subject">Description</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" required></textarea>

    <input type="submit" class="btn btn-primary" onsubmit= btn() value="Submit">
  </form>
</div>


<script>
    function btn(){
        alert("msg submitted");
    }
</script>




<?php include('footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>