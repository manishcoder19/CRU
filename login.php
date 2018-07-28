<?php
require 'conn.php';
$name=$_REQUEST["name"];
$password=$_REQUEST["password"];

$sql="select * from student where name='$name' and password='$password'";
$rs=  mysqli_query($con, $sql);
$row =mysqli_fetch_array($rs);
if($row>0)
{
  header("location:user.php");
}
else
{
    header("location:signin.php");
}
?>
