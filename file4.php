<?php
require_once'connect.php';
?>
<form action="file4.php" method="GET">
Запрос на удаление:<SELECT name="NameAvtor">


<?php
$result = mysqli_query($link,"SELECT
proizvodstvo.nameizdeliya
FROM proizvodstvo");
$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach ($rows as $row)
{
echo "<option>". ($row['nameizdeliya']."</option>");
}
?>
<input type="submit" name="submit" value="удалить"><br>
</form>
<?php
if($_GET['submit'])
{
$result=mysqli_query($link,"DELETE LOW_PRIORITY QUICK FROM proizvodstvo
	WHERE proizvodstvo.nameizdeliya = '$_GET[NameAvtor]'
	LIMIT 100");
}
?>

<br><input type="submit" value="Назад" onclick="location.href='book_autor.php';" /></br>