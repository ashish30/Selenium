<?php
include 'config.php';
//print_r($_POST);
//die();

$id= $_GET['id'];
$name=$_POST['name'];
$phone=$_POST['phone'];


$sql="update user set name='$name',phone='$phone' where id=$id";

//echo $sql;die;
if(mysql_query($sql))
{
header('Location: display.php');
}
?>
