<?php
$URL = "http://api.openweathermap.org/data/2.5/weather?q=Mozhaysk,ru&appid=53553b47a6c757f074474403c5c220ae";

$fileNameTXT = 'cache.txt';
if (file_exists($fileNameTXT) == false){
    $fileTXT = fopen($fileNameTXT,'x');
    $str = file_get_contents($URL);
    fwrite($fileTXT, $str);
    fclose($fileTXT);
}
elseif (date ("G", fileatime($fileNameTXT)) < 24) {
    $handle = fopen($fileNameTXT, "r");
    $str = fread($handle, filesize($fileNameTXT));
    fclose($handle);
    }
else{
    $str = file_get_contents($URL);
}

$JSON = json_decode($str);
$myCountry = $JSON -> sys -> country;
$myCity = $JSON -> name;
$date = date ("F d Y H:i:s.", $JSON -> dt);
$temp = $JSON -> main -> temp;
$humid = $JSON -> main -> humidity;
$speed = $JSON -> wind -> speed;

?>
<h2>Погодные условия в <?= $myCity ?></h2>
    <p>Страна: <?= $myCountry ?></p>
    <p>Текущая дата: <?= $date ?></p>
    <p>Температура: <?= $temp ?></p>
    <p>Скорость ветра: <?= $speed ?></p>
    <p>Влажность: <?= $humid ?></p>

<img src = "\pr4\Weather forecast hourly graphic.png" alt="График погоды">









