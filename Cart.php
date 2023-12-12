<?php

namespace App\Entity;

use App\Repository\CartRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartRepository::class)]
class Cart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'carts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $cuserid = null;

    #[ORM\ManyToOne(inversedBy: 'carts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Product $cproid = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $cquantity = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $cdate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCuserid(): ?User
    {
        return $this->cuserid;
    }

    public function setCuserid(?User $cuserid): static
    {
        $this->cuserid = $cuserid;

        return $this;
    }

    public function getCproid(): ?Product
    {
        return $this->cproid;
    }

    public function setCproid(?Product $cproid): static
    {
        $this->cproid = $cproid;

        return $this;
    }

    public function getCquantity(): ?int
    {
        return $this->cquantity;
    }

    public function setCquantity(int $cquantity): static
    {
        $this->cquantity = $cquantity;

        return $this;
    }

    public function getCdate(): ?\DateTimeInterface
    {
        return $this->cdate;
    }

    public function setCdate(\DateTimeInterface $cdate): static
    {
        $this->cdate = $cdate;

        return $this;
    }
}
