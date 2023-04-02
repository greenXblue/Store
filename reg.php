<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
include("connect.php");
include("header.php"); 

$title="Регистрация";
$fam=$_POST["fam"];
$im=$_POST["im"];
$addr=$_POST["addr"];
$mail=$_POST["mail"];
$pass=$_POST["pass"];
$pass2=$_POST["pass2"];
$login=$_POST["login"];
$type=$_POST["type"];
$subscribe=$_POST["subscribe"]; 
if($type==1)
{
	if($fam!="" && $im!="" && $addr!="" && $mail!="" && $login!="" && $pass!="" && $pass2!="")
	{
		if($pass!=$pass2)
		$message="<b>Поля пароля и повтора пароля не совпадают!</b>";	
		else
		{
			$strSQL1="SELECT id_cust FROM customers WHERE login='".$login."'";
			$result1=mysql_query($strSQL1) or die("Не могу выполнить запрос!"); 
			if($row=mysql_fetch_array($result1))
				$message="<tr><td bgcolor='#ff9999' align='center'><b>Такой логин уже существует! Выберите другой логин</b></td></tr>";
			else
			{
				$strSQL1="INSERT INTO customers (fam, im, addr, mail, login, pass, subscribe) VALUES('".$fam."','".$im."','".$addr."','".$mail."','".$login."','".$pass."','".$subscribe."')";
				$result1=mysql_query($strSQL1) or die("Не могу выполнить запрос 2!");
				$message="<br><tr><td align='center'><b>Вы успешно зарегистрированы!</b></td></tr>";
				$success=true;
			}
		}
	}
else
 $message="<tr><td bgcolor='#ff9999' align='center'><b>Не все поля заполнены!</b></td></tr>";
}
print $message;
if(!$success){
	echo"
		<form action=reg.php method=post>
		<table border=0 width=100% align=center>
			<tr>
			<hr>
				<td align=right width=50%><i>Фамилия: </i></td><td><input type=text name=fam value='" .$fam. "'>*</td></tr>
				<tr><td align=right><i>Имя: </i></td><td><input type=text name=im value='" .$im. "'>*</td></tr>
				<tr><td align=right><i>Адрес: </i></td><td><input type=text name=addr value='" .$addr. "'>*</td></tr>
				<tr><td align=right><i>E-mail: </i></td><td><input type=text name=mail value='" .$mail. "'>*</td></tr>
				<tr><td align=right><i>Логин: </i></td><td><input type=text name=login value='" .$login. "'>*</td>
			</tr>
		<tr><td align=right><i>Пароль: </i></td><td><input type=password name=pass value=''>*</td></tr>
		<tr><td align=right><i>Повтор пароля: </i></td><td><input type=password name=pass2 value='' >*</td></tr>
		<tr><td></td><td><input type='checkbox' value=1 name=subscribe><i>Подписаться на рассылку новостей</i></td></tr><input type=hidden value=1 name=type>
		<tr><td align=right></td><td><input type=submit value='отправить'></td></tr>
		</table>
		<center><small>* Звездочками отмечены обязательные поля</small></center>
		</form>";
mysql_close();
}
include("footer.php");
?>
</body>
</html>