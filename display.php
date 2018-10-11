<?php

include 'config.php';

$sql = "select *,user_settings.code,user_settings.value from user inner join user_settings on user.id=user_settings.user_id";

//echo $sql;die;
$result = mysql_query ($sql);
echo "<table border='1' >";
echo "<tr><td><b>Name</td><td><b>Email</td><td><b>Phone</td><td><b>Phones</td><td>delete</td><td>edit</td></tr><tr><a href ='index.php'>Add</a></tr>";  
while($row=mysql_fetch_assoc($result))
{
//echo '<pre>'; print_r(($row)); 
echo "<tr><td>".$row['name']."</td><td>".($row['code'] === 'mail' ? $row['value'] : '')."</td><td>".$row['phone']."</td><td>".($row['code'] === 'phones' ? $row['value'] : '')."</td><td><a href='delete.php?id=".$row['id']. "'>delete</a><td><a href='edit.php?id=".$row['id']. "'>edit</a></td></tr>";


}
echo "</table>";


?>

