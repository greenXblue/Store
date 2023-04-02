<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$title="КАТАЛОГ";
$color="#aaddff";
include("header.php");
include("connect.php");
$strSQL1="SELECT * FROM publishers ORDER BY name_publ";
$result1=mysql_query($strSQL1) or die("Не могу выполнить запрос!");
$strSQL2="SELECT * FROM categories ORDER BY name_cat";
$result2=mysql_query($strSQL2) or die("Не могу выполнить запрос!");

echo "
<table border=0 width=100%>
<tr><td width=50%><center><h1>Товары</h1></center>
<ul>";
while ($row=mysql_fetch_array($result1))
echo "<li><a href='show.php?type=1&id_publ=" .$row['id_publ']. "'>" .$row['name_publ']. "</a>";
echo "
</ul><td>
<td width=25%><center><h1>Категории</h1></center>
<ul>";
while ($row=mysql_fetch_array($result2))
echo "<li><a href='show.php?type=2&id_cat=" .$row['id_cat']. "'>" .$row['name_cat']. "</a>";
echo"
</ul></td>
<ul><td>
</tr>
</table>";
include("footer.php");
mysql_close();
?>
	
</body>
</html>