<?php

namespace App\Entity;

use App\Repository\PayementsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PayementsRepository::class)]
class Payements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ref = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $payed_at = null;

    #[ORM\Column(length: 255)]
    private ?string $mode = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $details = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Orders $oreders = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(?string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getPayedAt(): ?\DateTimeImmutable
    {
        return $this->payed_at;
    }

    public function setPayedAt(?\DateTimeImmutable $payed_at): self
    {
        $this->payed_at = $payed_at;

        return $this;
    }

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function setMode(string $mode): self
    {
        $this->mode = $mode;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getOreders(): ?Orders
    {
        return $this->oreders;
    }

    public function setOreders(?Orders $oreders): self
    {
        $this->oreders = $oreders;

        return $this;
    }
}
