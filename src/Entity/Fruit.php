<?php

namespace App\Entity;

use App\Repository\FruitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FruitRepository::class)]
class Fruit extends Product
{
    public static function createFromArray(array $data): self
    {
        $fruit = new self();
        $fruit->setName($data['name']);
        $fruit->setQuantity($data['quantity']);
        return $fruit;
    }
}
