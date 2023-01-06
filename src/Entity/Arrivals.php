<?php

namespace App\Entity;

use App\Repository\ArrivalsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArrivalsRepository::class)]
class Arrivals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $closed_at = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_closed = null;

    #[ORM\OneToMany(mappedBy: 'arrivals', targetEntity: ArrivalsDetails::class)]
    private Collection $arrivalsDetails;

    public function __construct()
    {
        $this->arrivalsDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getClosedAt(): ?\DateTimeImmutable
    {
        return $this->closed_at;
    }

    public function setClosedAt(?\DateTimeImmutable $closed_at): self
    {
        $this->closed_at = $closed_at;

        return $this;
    }

    public function isIsClosed(): ?bool
    {
        return $this->is_closed;
    }

    public function setIsClosed(?bool $is_closed): self
    {
        $this->is_closed = $is_closed;

        return $this;
    }

    /**
     * @return Collection<int, ArrivalsDetails>
     */
    public function getArrivalsDetails(): Collection
    {
        return $this->arrivalsDetails;
    }

    public function addArrivalsDetail(ArrivalsDetails $arrivalsDetail): self
    {
        if (!$this->arrivalsDetails->contains($arrivalsDetail)) {
            $this->arrivalsDetails->add($arrivalsDetail);
            $arrivalsDetail->setArrivals($this);
        }

        return $this;
    }

    public function removeArrivalsDetail(ArrivalsDetails $arrivalsDetail): self
    {
        if ($this->arrivalsDetails->removeElement($arrivalsDetail)) {
            // set the owning side to null (unless already changed)
            if ($arrivalsDetail->getArrivals() === $this) {
                $arrivalsDetail->setArrivals(null);
            }
        }

        return $this;
    }
}
