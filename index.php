<?php
$file = file_get_contents(
        "http://api.openweathermap.org/data/2.5/weather?q=Mozhaysk,ru&appid=53553b47a6c757f074474403c5c220ae");

$JSON = json_decode($file);
$myCountry = $JSON -> sys -> country;
$myCity = $JSON -> name;

$JSONa = json_decode($file,true);

foreach ($JSONa as $key => $value) {

    if (is_array($value)) {

        if ($key == "dt") {
            $date = date('d/m/y',$value);
        }

        foreach($value as $k => $i){
            if ($k == 'temp'){
                $temp = $i;
            }

            if ($k == 'speed'){
                $speed = $i;
            }

            if ($k == 'humidity'){
                $humid = $i;
            }
        }
    }
}

?>
<h2>Погодные условия в <?= $myCity ?></h2>
    <p>Страна: <?= $myCountry ?></p>
    <p>Текущая дата: <?= $date ?></p>
    <p>Температура: <?= $temp ?></p>
    <p>Скорость ветра: <?= $speed ?></p>
    <p>Влажность: <?= $humid ?></p>

<img src = "\pr4\Weather forecast hourly graphic.png" alt="График погоды">









