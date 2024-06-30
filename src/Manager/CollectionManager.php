<?php

namespace App\Manager;

use App\Collection\FruitCollection;
use App\Collection\VegetableCollection;
use App\Entity\Fruit;
use App\Entity\Vegetable;
use Doctrine\Common\Collections\ArrayCollection;

class CollectionManager
{
    private array $typeToCollectionMapping;
    private array $typeToEntityMapping;

    public function __construct()
    {
        $this->typeToCollectionMapping = [
            'fruit' => new FruitCollection,
            'vegetable' => new VegetableCollection,
        ];

        $this->typeToEntityMapping = [
            'fruit' => Fruit::class,
            'vegetable' => Vegetable::class,
        ];
    }

    public function processJson(string $json): void
    {
        $data = json_decode($json, true);

        foreach ($data as $item) {
            $collection = $this->getCollectionClass($item['type']);

            $entityClass = $this->getEntityClass($item['type']);
            $entity = $entityClass::createFromArray($item);

            $collection->add($entity);
        }
    }

    public function getCollectionClass(string $type): ArrayCollection
    {
        if (!isset($this->typeToCollectionMapping[$type])) {
            throw new \InvalidArgumentException('Unknown type: ' . $type);
        }

        return $this->typeToCollectionMapping[$type];
    }

    public function getEntityClass(string $type): string
    {
        if (!isset($this->typeToEntityMapping[$type])) {
            throw new \InvalidArgumentException('Unknown type: ' . $type);
        }

        return $this->typeToEntityMapping[$type];
    }
}