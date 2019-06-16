<?php
/*
 * 1. Создать галерею фотографий.
 * Она должна состоять всего из одной странички, на которой пользователь видит все картинки в уменьшенном виде и форму для загрузки нового изображения.
 * При клике на фотографию она должна открыться в браузере в новой вкладке.
 * Размер картинок можно ограничивать с помощью свойства width.
 * При загрузке изображения необходимо делать проверку на тип и размер файла.

2. *Строить фотогалерею, не указывая статичные ссылки к файлам, а просто передавая в функцию построения адрес папки с изображениями.
Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней.

3. *[ для тех, кто изучал JS-1 ]
При клике по миниатюре нужно показывать полноразмерное изображение в модальном окне
(материал в помощь: https://www.internet-technologies.ru/articles/sozdaem-prostoe-modalnoe-okno-s-pomoschyu-jquery.html)
 */

// обработка нажатия по кнопке
if(isset($_POST['submit'])) {

    // папка
    $dir = 'img/';
    $file = $dir.basename($_FILES['fileToUpload']['name']);
    $status = 1;
    $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    // проверка раз
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // существование файла
    if (file_exists($file)) {
        echo "Файл уже существует, загружен";
        $uploadOk = 0;
    }

    // файл слишком большой
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Слишком большой вес";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Прирнимаем только JPG, JPEG, PNG & GIF";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Файл не загружен";

    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $file)) {
            echo "Файл ". basename( $_FILES["fileToUpload"]["name"]). " загружен.";
        } else {
            echo "Файл не загружен";
        }
    }

}

$img = 'img';

$files = scandir($img);
echo'
<form action="lesson4.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
';

function list_dir($img){

    $files = scandir($img);

    foreach($files as $file){
        if($file == '.' OR $file == '..') {}
        else {
            echo '<a href="'.$img.'/'.$file.'" target="_blank"><img src="' . $img . '/' . $file . '" width="100"></a><br/>';
        }
    }

}

list_dir($img);


?>