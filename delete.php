<?php
$id=$_GET['id'];

include 'config.php';
$sql="delete from user_settings where id=$id";

//echo $sql;die;
if(mysql_query($sql))
{
header('Location: display.php');
}


?>
