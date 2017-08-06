<?php
$file = file_get_contents('tsconfig.json');
$JSON = json_decode($file);

$myCountry = $JSON -> sys -> country;
echo "<p>Страна: " . $myCountry . "</p>";

$myCity = $JSON -> name;
echo "<p>Город: " . $myCity . "</p>";

$JSONa = json_decode($file,true);

foreach ($JSONa as $key => $value) {

    if (is_array($value)) {

        foreach($value as $k => $i){
            if ($k == 'temp'){
                echo "<p>Температура: " . $i . "</p>";
            }

            if ($k == 'speed'){
                echo "<p>Скорость ветра: " . $i . "</p>";
            }

            if ($k == 'humidity'){
                echo "<p>Влажность: " . $i . "</p>";
            }

        }
    }

    if ($key == "dt") {
        $x = date('d/m/y',$value);
        echo "<p>Текущая дата: " . $x . "</p>";
    }


}

?>;

<img src = "\pr4\Weather forecast hourly graphic.png" alt="Погода в Можайске">









