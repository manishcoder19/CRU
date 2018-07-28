<?php
require 'conn.php';
$name=$_REQUEST["productname"];
$pr=$_REQUEST["price"];
$quan=$_REQUEST["quantity"];
$Ema=$_REQUEST["Email"];

$sql="insert into customer(productname,price,quantity,Email) values('$name','$pr','$quan','$Ema') ";
$r=mysqli_query($con, $sql);
if($r>0)
{
  header("location:user.php");
}


