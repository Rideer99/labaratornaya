<?php
require_once 'connect.php';
?>
<form action="book_autor.php" method="GET">
Введите данные которые хотите искать из таблицы ( имя приемщика, имя изделия, дату: ) <SELECT name="NameAvtor">
<?php
$result = mysqli_query($link,"SELECT
 product.cex
 FROM product");
$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach ($rows as $row)
{
echo "<option>". ($row['cex']."</option>");
}
?>
<input type="submit" name="submit" value="Поиск"><br>
</form>

<?php

if ($_GET['submit'])
{
$result=mysqli_query($link,"
SELECT
  proizvodstvo.kolvobrak,
  proizvodstvo.nameizdeliya,
  proizvodstvo.dataproizvodtva
FROM priemshiki
  INNER JOIN product
    ON priemshiki.id_priemshiki = product.id_zavod
  INNER JOIN proizvodstvo
    ON product.id_zavod = proizvodstvo.id_proizvodstva
WHERE product.cex = '$_GET[NameAvtor]'");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach($rows as $row)
{
	echo 'Кол-во бракованного товара: ';
	print ($row['kolvobrak']."<br>");
	echo 'Название: ';
	print ($row['nameizdeliya']."<br>");
	echo 'Дата произоводства: ';
	print ($row['dataproizvodtva']."<br>");
}


}

?>
<br><input type="submit" value="запрос 2" onclick="location.href='file2.php';" /></br>
<br><input type="submit" value="запрос 3" onclick="location.href='file3.php';" /></br>
<br><input type="submit" value="запрос 4" onclick="location.href='file4.php';" /></br>
<br><input type="submit" value="запрос 5" onclick="location.href='file5.php';" /></br>