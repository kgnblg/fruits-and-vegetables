<?php

namespace App\Tests\App\Service;

use App\Service\StorageService;
use App\Manager\CollectionManager;
use App\Entity\Fruit;
use App\Entity\Vegetable;
use PHPUnit\Framework\TestCase;

class StorageServiceTest extends TestCase
{
    public function testReceivingRequest(): void
    {
        $request = file_get_contents('request.json');

        $storageService = new StorageService($request);

        $this->assertNotEmpty($storageService->getRequest());
        $this->assertIsString($storageService->getRequest());

        $manager = new CollectionManager();
        $manager->processJson($storageService->getRequest());

        // Test fruit collection
        $fruits = $manager->getCollectionClass('fruit');
        $this->assertCount(10, $fruits); // Total fruits in the JSON data

        foreach ($fruits as $fruit) {
            $this->assertInstanceOf(Fruit::class, $fruit);
            $this->assertGreaterThan(0, $fruit->getQuantity());
        }

        // Test vegetable collection
        $vegetables = $manager->getCollectionClass('vegetable');
        $this->assertCount(10, $vegetables); // Total vegetables in the JSON data

        foreach ($vegetables as $vegetable) {
            $this->assertInstanceOf(Vegetable::class, $vegetable);
            $this->assertGreaterThan(0, $vegetable->getQuantity());
        }
    }
}
