<?php

function showDateWithAsPerTimeZone($dateTime, $timeZone){
    $dt = new DateTime($dateTime);
    $tz = new DateTimeZone($timeZone);
    $dt->setTimezone($tz);
    return $dt->format('Y-m-d h:i:s A');
}
