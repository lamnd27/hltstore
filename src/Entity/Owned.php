<?php

namespace App\Entity;

use App\Repository\OwnedRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OwnedRepository::class)]
class Owned
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'owneds')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Product $oproid = null;

    #[ORM\ManyToOne(inversedBy: 'owneds')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Branch $obranchid = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $opquan = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $opcreated = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOproid(): ?Product
    {
        return $this->oproid;
    }

    public function setOproid(?Product $oproid): static
    {
        $this->oproid = $oproid;

        return $this;
    }

    public function getObranchid(): ?Branch
    {
        return $this->obranchid;
    }

    public function setObranchid(?Branch $obranchid): static
    {
        $this->obranchid = $obranchid;

        return $this;
    }

    public function getOpquan(): ?int
    {
        return $this->opquan;
    }

    public function setOpquan(int $opquan): static
    {
        $this->opquan = $opquan;

        return $this;
    }

    public function getOpcreated(): ?\DateTimeInterface
    {
        return $this->opcreated;
    }

    public function setOpcreated(\DateTimeInterface $opcreated): static
    {
        $this->opcreated = $opcreated;

        return $this;
    }
}
