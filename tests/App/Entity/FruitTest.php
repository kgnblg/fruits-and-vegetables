<?php

use PHPUnit\Framework\TestCase;
use App\Entity\Fruit;

class FruitTest extends TestCase
{
    public function testCreateFromArray()
    {
        $data = [
            'name' => 'Apple',
            'quantity' => 100,
        ];

        $fruit = Fruit::createFromArray($data);

        $this->assertInstanceOf(Fruit::class, $fruit);
        $this->assertEquals('Apple', $fruit->getName());
        $this->assertEquals(100, $fruit->getQuantity());
    }
}
