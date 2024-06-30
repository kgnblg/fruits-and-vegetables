<?php

namespace App\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Fruit;
use App\Manager\CollectionStrategy;

class FruitCollection extends ArrayCollection implements CollectionStrategy
{
    public function list(): array
    {
        $result = [];
        foreach ($this as $fruit) {
            $result[$fruit->getName()] = $fruit->getQuantity();
        }
        return $result;
    }

    public function search(string $name): ?Fruit
    {
        return $this->get($name);
    }
}
