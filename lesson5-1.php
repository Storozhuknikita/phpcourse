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

$id = $_GET['id'];

$result = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM `gallery` WHERE `id`=".$id.""));

echo'Фото с id: '.$result['id'].' <br/> 
<img src="'.$result['link'].'" width="100"><br/>
Размер изображения: '.$result['size'].'<br/>
Кол-во просмотров: '.$result['count'];


mysqli_query($link, "UPDATE gallery SET count = 5");

/*if(mysqli_query($link, "UPDATE `gallery` SET count = count + 1 WHERE id = '".$id."'")){
    echo 'Статистика просмотров: '.$count.'<br/>';
} else {
    echo 'Статистика недоступна';
}*/

