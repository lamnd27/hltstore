<?php

namespace App\Entity;

use App\Repository\BranchRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BranchRepository::class)]
class Branch
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Address = null;

    #[ORM\OneToMany(mappedBy: 'obranchid', targetEntity: Owned::class)]
    private Collection $owneds;

    #[ORM\Column(length: 255)]
    private ?string $bname = null;

    public function __construct()
    {
        $this->owneds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): static
    {
        $this->Address = $Address;

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
            $owned->setObranchid($this);
        }

        return $this;
    }

    public function removeOwned(Owned $owned): static
    {
        if ($this->owneds->removeElement($owned)) {
            // set the owning side to null (unless already changed)
            if ($owned->getObranchid() === $this) {
                $owned->setObranchid(null);
            }
        }

        return $this;
    }

    public function getBname(): ?string
    {
        return $this->bname;
    }

    public function setBname(string $bname): static
    {
        $this->bname = $bname;

        return $this;
    }
}
