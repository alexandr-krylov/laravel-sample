<?php

if (!defined("ASC")){
    define("ASC", 1);
}

if (!defined("DESC")){
    define("DESK", 2);
}

if (!defined("MAX_LENGTH")){
    define("MAX_LENGTH", 10);
}

if (!defined("MIN_VALUE")){
    define("MIN_VALUE", -10);
}

if (!defined("MAX_VALUE")){
    define("MAX_VALUE", 10);
}
if (!function_exists("arraySort")) {
    function arraySort(array $array, int $direction = ASC)
    {
        if (count($array) > MAX_LENGTH) throw new LengthException();
        usort($array, function($a, $b) use ($direction) {
            if ($a < MIN_VALUE || $a > MAX_VALUE || $b < MIN_VALUE || $b > MAX_VALUE) throw new RangeException();
            switch ($direction) {
                case ASC : return $a - $b;
                case DESK : return $b - $a;
            }
        });
        return $array;
    }
}
