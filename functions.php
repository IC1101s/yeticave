<?php

function formateSum ($sum) {
    $intSum = ceil($sum);

    if ($intSum < 1000) {
        return $intSum;
    }

    return number_format($intSum, 0, '', ' ');
};

function getTiming ($date) {
    date_default_timezone_set('Europe\Moscow');

    $dateEnd = date_create($date);
    $dateNow = date_create();
    $differenceDate = date_diff($dateEnd, $dateNow);
    $formattedDifference = date_interval_format($differenceDate, '%d %H %i');
    $arr = explode(' ', $formattedDifference);

    $minutes = str_pad($arr[2], 2, "0", STR_PAD_LEFT); 
    $hours = str_pad($arr[0] * 24 + $arr[1], 2, "0", STR_PAD_LEFT); 

    $res[0] = $hours;
    $res[1] = $minutes;
  
    return $res;
};

?>