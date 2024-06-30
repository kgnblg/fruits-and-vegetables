<?php

namespace App\Helper;

class UnitConversionHelper
{
    public static function convertToKilograms(float $grams): float
    {
        return $grams / 1000;
    }

    public static function convertToGrams(float $kilograms): float
    {
        return $kilograms * 1000;
    }
}
