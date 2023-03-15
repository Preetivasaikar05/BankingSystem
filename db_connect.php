<?php


$SERVERNAME="localhost";
$USERNAME="root";
$PASSWORD="";
$DATABASE="spark";
$conn = mysqli_connect($SERVERNAME,$USERNAME,$PASSWORD,$DATABASE);

if(!$conn)
{
    die("sorry not connected".mysqli_connect_error());
}



//echo "connected <br>";








?>