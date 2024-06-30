<?php

use PHPUnit\Framework\TestCase;
use App\Manager\CollectionManager;
use App\Entity\Fruit;
use App\Entity\Vegetable;

class CollectionManagerTest extends TestCase
{
    public function testProcessJsonWithFruitsAndVegetables()
    {
        $json = '[
            {"type": "fruit", "name": "Apple", "quantity": 100},
            {"type": "vegetable", "name": "Carrot", "quantity": 200},
            {"type": "fruit", "name": "Banana", "quantity": 150}
        ]';

        $manager = new CollectionManager();
        $manager->processJson($json);

        $fruits = $manager->getCollectionClass('fruit');
        $vegetables = $manager->getCollectionClass('vegetable');

        $this->assertCount(2, $fruits); // Check if two fruits are added
        $this->assertCount(1, $vegetables); // Check if one vegetable is added

        // Test entities in collections
        $this->assertInstanceOf(Fruit::class, $fruits[0]);
        $this->assertInstanceOf(Vegetable::class, $vegetables[0]);
    }

    public function testProcessJsonWithInvalidType()
    {
        $json = '[{"type": "invalid", "name": "Mango", "quantity": 120}]';

        $manager = new CollectionManager();

        $this->expectException(\InvalidArgumentException::class);
        $manager->processJson($json);
    }
}
