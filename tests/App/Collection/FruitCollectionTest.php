<?php

use PHPUnit\Framework\TestCase;
use App\Collection\FruitCollection;
use App\Entity\Fruit;

class FruitCollectionTest extends TestCase
{
    public function testAddAndList()
    {
        $collection = new FruitCollection();

        $fruit1 = new Fruit();
        $fruit1->setName('Apple');
        $fruit1->setQuantity(100);

        $fruit2 = new Fruit();
        $fruit2->setName('Banana');
        $fruit2->setQuantity(150);

        $collection->add($fruit1);
        $collection->add($fruit2);

        $fruits = $collection->list();

        $this->assertCount(2, $fruits);
        $this->assertArrayHasKey('Apple', $fruits);
        $this->assertEquals(150, $fruits['Banana']);
    }
}
