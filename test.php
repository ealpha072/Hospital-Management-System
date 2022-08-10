<?php
$cars = [32,334,4545,54545];
$news = [87,878,87];

foreach($news as $fig){
    array_push($cars, $fig);
}

var_dump($cars)
?>