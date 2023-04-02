<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<?php
include("header.php"); 
include("connect.php");
$type=$_POST["type"];
$bonus=$_POST["bonus"];
if($type==1)
{
	$strSQL1="SELECT name_pul FROM publishers WHERE id_publ = 1";
	$result1=mysql_query($strSQL1) or die("Не могу выполнить запрос!"); 
	$message="<br><tr><td align='center'><b>Вы успешно зарегистрированы!</b></td></tr>";
	$success=true;
}
print $message;
if(!$success){
	echo "			<form action=new.php method=post>
	<td align=right><i>Промокод: </i></td><td><input type=text name=im value='" .$bonus. "'>*</td>
		<tr><td align=right></td><td><input type=submit value='отправить'></td></tr>
</form>";
mysql_close();
}
include("footer.php");
?>

</body>
</html>