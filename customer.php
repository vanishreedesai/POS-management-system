<?php
session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'wholesale_management');
  
  $Name = $_POST['Name'];
  $Password = $_POST['Password'];
  $s="select * from customer_information where Name='$Name' and Password='$Password'";

  $res=mysqli_query($con,$s);

  while ($row= mysqli_fetch_array($res)) {
  	$CustomerID=$row['CustomerID'];
  }
  $num=mysqli_num_rows($res);

  if($num==1)
{
  $_SESSION['CustomerID']=$CustomerID;
  $_SESSION['Name']=$Name;
  header("Location:category.html");
  
}
else{
  echo "invalid";
}

?>


