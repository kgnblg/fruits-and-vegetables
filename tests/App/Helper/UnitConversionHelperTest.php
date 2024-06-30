<?php

use PHPUnit\Framework\TestCase;
use App\Helper\UnitConversionHelper;

class UnitConverterTest extends TestCase
{
    public function testGramsToKilograms()
    {
        $grams = 1500.0;
        $kiloGrams = 1.5;

        $result = UnitConversionHelper::convertToKilograms($grams);
        $this->assertEquals($kiloGrams, $result);

        $result = UnitConversionHelper::convertToGrams($kiloGrams);
        $this->assertEquals($grams, $result);
    }
}