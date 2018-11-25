<?php

/**
 *
 * @author Nikolay 2018
 * 
 */

$inc = include_once "vendor/autoload.php"; //автозагрузчик классов

use knn\download\Download; // Подключаем класс загрузчик файла 

$url = "localhost/pictures/nik.png"; // URL файла для загрузки
$target = "save/nik.png";            // Имя файл для записи

$ret = Download::downloadFile ($url, $target); // Вызов метода загрузки файла

if ($ret)
{
    echo "Файл загружен успешно. \n";
} else {
	echo "Ошибка при загрузке файла!" . $url . "\n";

}
