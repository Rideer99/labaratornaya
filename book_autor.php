<?php
require_once 'connect.php';
?>
<form action="book_autor.php" method="GET">
Введите данные которые хотите искать из таблицы ( имя приемщика, имя изделия, дату: ) <input type="text" name="NameAvtor"><br>
<input type="submit" name="submit" value="Поиск"><br>
</form>

<?php

if ($_GET['submit'])
{
$result=mysqli_query($link,"
SELECT
  priemshiki.priemshik,
  proizvodstvo.nameizdeliya
FROM product
  INNER JOIN proizvodstvo
    ON product.id_zavod = proizvodstvo.id_proizvodstva
  INNER JOIN priemshiki
    ON product.id_zavod = priemshiki.id_priemshiki
WHERE product.name =  '$_GET[NameAvtor]'");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach($rows as $row)
{
	echo 'Приемщик: ';
	print ($row['priemshik']."<br>");
	
}

}
if($_GET['submit'])
{
$result=mysqli_query($link,"
SELECT
  proizvodstvo.nameizdeliya,
  product.stoimost,
   proizvodstvo.dataproizvodtva
FROM product
  INNER JOIN proizvodstvo
    ON product.id_zavod = proizvodstvo.id_proizvodstva
  INNER JOIN priemshiki
    ON product.id_zavod = priemshiki.id_priemshiki
WHERE priemshiki.priemshik = '$_GET[NameAvtor]'");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);

foreach($rows as $row)
{
	
	echo 'Имя изделия: ';
	print ($row['nameizdeliya']."<br>");
	echo 'Стоимость за еденицу: ';
	print ($row['stoimost']."<br>");
	echo 'Дата производства: ';
	print ($row['dataproizvodtva']."<br>");

}
}
if($_GET['submit'])
{
$result=mysqli_query($link,"
SELECT
  priemshiki.nameizdeliya
FROM product
  INNER JOIN priemshiki
    ON product.id_zavod = priemshiki.id_priemshiki
  INNER JOIN proizvodstvo
    ON product.id_zavod = proizvodstvo.id_proizvodstva
WHERE proizvodstvo.dataproizvodtva = '$_GET[NameAvtor]'");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);

foreach($rows as $row)
{
	echo 'Производство: ';
	print ($row['nameizdeliya']."<br>");
}
if ($_GET['submit'])
{
$result=mysqli_query($link,"
SELECT
  proizvodstvo.kolvobrak
FROM priemshiki
  INNER JOIN product
    ON priemshiki.id_priemshiki = product.id_zavod
  INNER JOIN proizvodstvo
    ON product.id_zavod = proizvodstvo.id_proizvodstva
WHERE product.cex = '$_GET[NameAvtor]'");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo `<tr><td>`.$id.`</td><td>`.$login.`</td>`;
echo `<td>`.$mail.`</td><td>`.$reg_time.`</td></tr>`;
foreach($rows as $row)
{
	echo 'Кол-во бракованного товара: ';
	print ($row['kolvobrak']."<br>");
	
}

}



}

?>
<br><input type="submit" value="запрос 2" onclick="location.href='file2.php';" /></br>
<br><input type="submit" value="запрос 3" onclick="location.href='file3.php';" /></br>
<br><input type="submit" value="запрос 4" onclick="location.href='file4.php';" /></br>
<br><input type="submit" value="запрос 5" onclick="location.href='file5.php';" /></br>