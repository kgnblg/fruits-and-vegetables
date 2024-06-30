<?php

namespace App\Entity;

use App\Repository\VegetableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VegetableRepository::class)]
class Vegetable extends Product
{
    public static function createFromArray(array $data): self
    {
        $vegetable = new self();
        $vegetable->setName($data['name']);
        $vegetable->setQuantity($data['quantity']);
        return $vegetable;
    }
}
