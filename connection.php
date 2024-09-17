<?php
$host="localhost";
$mysqlusers ="root";
$password ="";
$dbname ="form_info";

$conn = mysqli_connect($host,$mysqlusers,$password,$dbname);
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}
echo "Successfully Connect";

?>