<?php

if (!defined("ASC")){
    define("ASC", 1);
}

if (!defined("DESC")){
    define("DESK", 2);
}

if (!function_exists("arraySort")) {
    function arraySort(array $array, int $direction = ASC)
    {
        if (count($array) > 10) throw new LengthException();
        switch ($direction) {
            case ASC : sort($array);
                break;
            case DESK : rsort($array);
                break;
        }
        return $array;
    }
}
