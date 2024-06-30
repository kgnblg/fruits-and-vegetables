<?php

use PHPUnit\Framework\TestCase;
use App\Entity\Vegetable;

class VegetableTest extends TestCase
{
    public function testCreateFromArray()
    {
        $data = [
            'name' => 'Carrot',
            'quantity' => 200,
        ];

        $vegetable = Vegetable::createFromArray($data);

        $this->assertInstanceOf(Vegetable::class, $vegetable);
        $this->assertEquals('Carrot', $vegetable->getName());
        $this->assertEquals(200, $vegetable->getQuantity());
    }
}
