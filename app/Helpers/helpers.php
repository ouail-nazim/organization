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
