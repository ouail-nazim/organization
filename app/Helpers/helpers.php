<?php

use Illuminate\Support\Facades\App;

function textSide()
{
    return App::currentLocale() == "ar" ? "text-right" : "text-left";
}
