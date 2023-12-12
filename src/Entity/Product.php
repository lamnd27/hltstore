<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
// use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $pname = null;

    #[ORM\Column(length: 100)]
    private ?string $pdesc = null;

    #[ORM\Column]
    private ?float $price = null;

    // #[ORM\Column(type: Types::SMALLINT)]
    // private ?int $pquan = null;

    // #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    // private ?\DateTimeInterface $pcreated = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $cat = null;

    #[ORM\OneToMany(mappedBy: 'cproid', targetEntity: Cart::class)]
    private Collection $carts;

    #[ORM\OneToMany(mappedBy: 'oproid', targetEntity: Owned::class)]
    private Collection $owneds;

    public function __construct()
    {
        $this->carts = new ArrayCollection();
        $this->owneds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPname(): ?string
    {
        return $this->pname;
    }

    public function setPname(string $pname): static
    {
        $this->pname = $pname;

        return $this;
    }

    public function getPdesc(): ?string
    {
        return $this->pdesc;
    }

    public function setPdesc(string $pdesc): static
    {
        $this->pdesc = $pdesc;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    // public function getPquan(): ?int
    // {
    //     return $this->pquan;
    // }

    // public function setPquan(int $pquan): static
    // {
    //     $this->pquan = $pquan;

    //     return $this;
    // }

    // public function getPcreated(): ?\DateTimeInterface
    // {
    //     return $this->pcreated;
    // }

    // public function setPcreated(\DateTimeInterface $pcreated): static
    // {
    //     $this->pcreated = $pcreated;

    //     return $this;
    // }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getCat(): ?Category
    {
        return $this->cat;
    }

    public function setCat(?Category $cat): static
    {
        $this->cat = $cat;

        return $this;
    }

    /**
     * @return Collection<int, Cart>
     */
    public function getCarts(): Collection
    {
        return $this->carts;
    }

    public function addCart(Cart $cart): static
    {
        if (!$this->carts->contains($cart)) {
            $this->carts->add($cart);
            $cart->setCproid($this);
        }

        return $this;
    }

    public function removeCart(Cart $cart): static
    {
        if ($this->carts->removeElement($cart)) {
            // set the owning side to null (unless already changed)
            if ($cart->getCproid() === $this) {
                $cart->setCproid(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Owned>
     */
    public function getOwneds(): Collection
    {
        return $this->owneds;
    }

    public function addOwned(Owned $owned): static
    {
        if (!$this->owneds->contains($owned)) {
            $this->owneds->add($owned);
            $owned->setOproid($this);
        }

        return $this;
    }

    public function removeOwned(Owned $owned): static
    {
        if ($this->owneds->removeElement($owned)) {
            // set the owning side to null (unless already changed)
            if ($owned->getOproid() === $this) {
                $owned->setOproid(null);
            }
        }

        return $this;
    }
}
