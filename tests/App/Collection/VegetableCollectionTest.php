<?php

use PHPUnit\Framework\TestCase;
use App\Collection\VegetableCollection;
use App\Entity\Vegetable;

class VegetableCollectionTest extends TestCase
{
    public function testAddAndList()
    {
        $collection = new VegetableCollection();

        $vegetable1 = new Vegetable();
        $vegetable1->setName('Carrot');
        $vegetable1->setQuantity(200);

        $vegetable2 = new Vegetable();
        $vegetable2->setName('Spinach');
        $vegetable2->setQuantity(120);

        $collection->add($vegetable1);
        $collection->add($vegetable2);

        $vegetables = $collection->list();

        $this->assertCount(2, $vegetables);
        $this->assertArrayHasKey('Carrot', $vegetables);
        $this->assertEquals(120, $vegetables['Spinach']);
    }
}
