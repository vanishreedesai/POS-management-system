<?php
session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'db2');

  $username = $_POST['username'];
  $password = $_POST['password'];
  $s="select *from login where username='$username' and password='$password'";
  $res=mysqli_query($con,$s);
  $num=mysqli_num_rows($res);
  if($num==1)
{
   header("Location:customer.html");
}
else{
  echo "invalid";
}
 
?>