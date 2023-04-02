<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
session_start();
$title="Личный кабинет";
$log=$_SESSION["log"];
$id=$_SESSION["id"];
$color="#aaaaff";
if(!isset($log))
	{
		$success=false;
		$message="<center><b>Вы не авторизованы!</b></center>";
	}
else
$success=true;
include("header.php"); 
if($success)
	{
		include("connect.php");
		$strSQL="SELECT * FROM customers WHERE id_cust='".$id."'";
		$result=mysql_query($strSQL) or die("Не могу выполнить запрос!"); 
		if($row=mysql_fetch_array($result))
	{
		echo"
			<form action=change.php method=post>
			<h3>Ваши личные данные</h3>
			<table border=1 width=100% align=right >
			<tr>
				<td align=right><i>Фамилия: </i></td><td><input type=text name=fam value=" .$row["fam"]. "></td>
				<td align=right><i>Имя: </i></td><td><input type=text name=im value=" .$row["im"]. "></td>
			</tr>
			<tr>
				<td align=right><i>Адрес: </i></td><td><input type=text name=addr value=" .$row["addr"]. "></td>
				<td align=right><i>E-mail: </i></td><td><input type=text name=mail value=" .$row["mail"]. "></td>
			</tr>
			<tr>
		<td align=right colspan=4><i><input type=checkbox value=1 name='subscribe'";
				if($row["subscribe"]==1)
				echo "checked";
		echo"
		>Подписаться на рассылку новостей</tr><tr><td align=center colspan=4><input type=submit value='сохранить изменения'></td></tr>
			</table>
			</form>";
print $message;
$strSQL1="SELECT id_order, date_ord FROM orders WHERE id_cust='".$id."' ORDER BY date_ord DESC";
$result1=mysql_query($strSQL1) or die("Не могу выполнить запрос 1!"); 
echo"<h3>Ваши заказы</h3>";
while($row1=mysql_fetch_array($result1))
	{
		$order=$row1["id_order"];
		$strSQL2="SELECT author, name_book, pages, price, kolvo, id_order, books.id_book FROM books, order_books WHERE books.id_book=order_books.id_book and id_order='".$order."'";
		$result2=mysql_query($strSQL2) or die("Не могу выполнить запрос 2!");
		echo"
			<b>Заказ № " .$order. " от " .$row1["date_ord"]. "><br></b>
			<table border=1 width=100% align=right >
			<tr>
				<td align=right width=20%><i>Автор: </i></td>
				<td align=right width=50%><i>Название: </i></td>
				<td align=right width=15%><i>Цена: </i></td>
				<td align=right width=50%><i>Количество: </i></td>
			</tr>";
		$sum=0; 
		while($row2=mysql_fetch_array($result2))
	{
		echo"
			<tr>
				<td>" .$row2["author"]. "</td>
				<td><b>" .$row2["name_book"]. "</b></td>
				<td>" .$row2["price"]. "</td>
				<td><b>" .$row2["kolvo"]. "</b></td>
			</tr>";
			$sum=$sum+$row2["price"]*$row2["kolvo"];
	}
$strSQL3="SELECT name_cat FROM categories, orders WHERE categories.id_cat=orders.bonus AND id_order='".$order."'";
$result3=mysql_query($strSQL3) or die("Не могу выполнить запрос 3!"); 
if($row3=mysql_fetch_array($result3))
{
	echo "<td colspan=2>Бесплатный каталог по теме <b>" .$row3["name_cat"]. "</b></td><td>0</td><td>1</td></tr>";
}
echo "</tr><tr><td></td><td align='right'><i>Итого: </i><td>" .$sum. "</td><td></td></tr></table>";
}
}
mysql_close();
}

include("footer.php");
?>

</body>
</html>