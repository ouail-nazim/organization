<?php

use Illuminate\Support\Facades\App;

function textSide()
{
    return App::currentLocale() == "ar" ? "text-right" : "text-left";
}
function currentLocale()
{
    return App::currentLocale();
}
function isRTL()
{
    return App::currentLocale() == "ar" ? true : false;
}
function getDateString($date)
{
    $dayName = $date->locale(App::currentLocale())->dayName;
    $monthName = $date->locale(App::currentLocale())->monthName;
    $day = $date->locale(App::currentLocale())->day;
    $year = $date->locale(App::currentLocale())->year;

    if (App::currentLocale() == "ar") {
        return  $dayName . " , " . $day . "  " . $monthName . " " . $year;
    } else {
        return $date->format('l jS \\of F Y ');
    }
}
