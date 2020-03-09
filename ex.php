<?php
//session_start();
// Make a MySQL Connection
session_start();
$con=mysqli_connect("localhost", "root", "") or die(mysqli_error());
mysqli_select_db($con,"wholesale_management");
require_once('customer.php');
if(isset($_POST['button']))
{    
	$checkBox = implode(',', $_POST['common']);

	$Price="SELECT Price FROM product WHERE item_name='$checkBox'";
	$run=mysqli_query($con,$Price);
	$ola=mysqli_fetch_assoc($run);
	$rate=$ola['Price'];

	$Name=$_SESSION['Name'];
	$cust_id = $_SESSION['CustomerID'];
	$q="SELECT CustomerID FROM customer_information WHERE Name='$Name'";
	$p=mysqli_query($con,$q);
	$s=mysqli_fetch_assoc($p);
	$id=$s['CustomerID'];
    $query="INSERT INTO summary VALUES ('" . $checkBox . "','$rate','$id')";     

    mysqli_query($con,$query);

    header("location:summary.php");
}

?>