<?php

namespace App\Entity;

use App\Repository\CouponsTypesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CouponsTypesRepository::class)]
class CouponsTypes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'coupons_types_id', targetEntity: Coupons::class)]
    private Collection $coupons;

    public function __construct()
    {
        $this->coupons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Coupons>
     */
    public function getCoupons(): Collection
    {
        return $this->coupons;
    }

    public function addCoupon(Coupons $coupon): self
    {
        if (!$this->coupons->contains($coupon)) {
            $this->coupons->add($coupon);
            $coupon->setCouponsTypesId($this);
        }

        return $this;
    }

    public function removeCoupon(Coupons $coupon): self
    {
        if ($this->coupons->removeElement($coupon)) {
            // set the owning side to null (unless already changed)
            if ($coupon->getCouponsTypesId() === $this) {
                $coupon->setCouponsTypesId(null);
            }
        }

        return $this;
    }
}
