<?php
require 'conn.php';
$username=$_REQUEST["username"];
$name=$_REQUEST["name"];
$password=$_REQUEST["password"];

$sql="insert into student(username,name,password) values('$username','$name','$password')";
$r=  mysqli_query($con, $sql);
if($r>0)
{
    header("location:index.php");
   
}


