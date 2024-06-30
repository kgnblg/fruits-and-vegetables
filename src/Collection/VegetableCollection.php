<?php

namespace App\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Vegetable;
use App\Manager\CollectionStrategy;

class VegetableCollection extends ArrayCollection implements CollectionStrategy
{
    public function list(): array
    {
        $result = [];
        foreach ($this as $vegetable) {
            $result[$vegetable->getName()] = $vegetable->getQuantity();
        }
        return $result;
    }

    public function search(string $name): ?Vegetable
    {
        return $this->get($name);
    }
}
