<?php
require_once 'connect.php';
?>
<form action="file4.php" method="GET">
Введите данные которые хотите искать из таблицы ( имя приемщика: ) <input type="text" name="NameAvtor"><br>
<input type="submit" name="submit" value="Поиск"><br>
</form>

<?php

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






?>
<input type="submit" value="назад" onclick="location.href='book_autor.php';" />