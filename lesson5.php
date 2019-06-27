<?php
/*
1. Создать галерею изображений, состоящую из двух страниц:

просмотр всех фотографий (уменьшенных копий);
просмотр конкретной фотографии (изображение оригинального размера) по ее ID в базе данных.
2. В базе данных создать таблицу, в которой будет храниться информация о картинках (адрес на сервере, размер, имя).

3. *На странице просмотра фотографии полного размера под картинкой должно быть указано число ее просмотров.

4. *На странице просмотра галереи список фотографий должен быть отсортирован по популярности. Популярность = число кликов по фотографии.
*/


define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', "1VZVMFZ8q");
define('DATABASE', 'phpcourse');

$link = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

$result = mysqli_query($link, "SELECT * FROM `gallery` ORDER by count desc ");

while($file = mysqli_fetch_assoc($result)) {

    echo'<a href="lesson5-1.php?id='.$file['id'].'" target="_blank"><img src="'.$file['link'].'" width="100"></a>';

}


mysqli_close($link);
