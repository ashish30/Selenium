<?php

$id=$_GET['id'];

include 'config.php';

//$sql="select * from user where id=$id";
 $sql="select *,user_settings.code,user_settings.value from user inner join user_settings on user.id=user_settings.user_id where user_settings.id=$id";
$result=(mysql_query($sql));

while($row=mysql_fetch_array($result))
{
//$city1=$row['id'];
//echo "<pre>";
//print_r($row);



?>
<html>
<body bgcolor="#FOFFFO">
<form method="post" action='<?php echo "update.php?id=".$id ;?>'>
<table align="center"  cellpadding="7" cellspacing="7" bgcolor="#C0C0C0" border="1">

<tr><td>Name</td><td> <input type="text" name="name" id="name" value='<?php echo $row['name']; ?>'</td></tr>
<tr><td>Email</td><td> <input type="text" name="email" id="uname" value='<?php echo $row['code'] === 'mail' ? $row['value'] : ''; ?>'/></td></tr>
<tr><td>Phone</td><td> <input type="text" name="phone" id="mail" value='<?php echo $row['phone']; ?>'/></td></tr>
<tr><td>Phones</td><td> <input type="text" name="phones" id="phone" value='<?php echo $row['code'] === 'phones' ? $row['value'] : ''; ?>'/></td></tr>

<tr><td colspan="2"><input type="submit" name="submit" value="Submit"></td></tr><br>



</form>
</table>
</body>
</html>

<?php
}
?>




