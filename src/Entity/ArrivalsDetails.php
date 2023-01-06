<?php

namespace App\Entity;

use App\Repository\ArrivalsDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArrivalsDetailsRepository::class)]
class ArrivalsDetails
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'arrivalsDetails')]
    private ?Arrivals $arrivals = null;

    #[ORM\ManyToOne(inversedBy: 'arrivalsDetails')]
    private ?Product $products = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArrivals(): ?Arrivals
    {
        return $this->arrivals;
    }

    public function setArrivals(?Arrivals $arrivals): self
    {
        $this->arrivals = $arrivals;

        return $this;
    }

    public function getProducts(): ?Product
    {
        return $this->products;
    }

    public function setProducts(?Product $products): self
    {
        $this->products = $products;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
