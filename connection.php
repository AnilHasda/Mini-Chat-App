<?php
$server="localhost:3306";
$user="root";
$pass="root";
$db="chatApplication";
$con=mysqli_connect($server,$user,$pass,$db);
if($con){
//echo "<script>alert('connection successfull')</script>";
}
else{
echo "<script>alert('connection failed')</script>";
}
?>