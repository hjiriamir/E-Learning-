<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CoachingCoupon
 *
 * @ORM\Table(name="coaching_coupon", indexes={@ORM\Index(name="IDX_B3F2E6A134FCDAC", columns={"id_coaching"})})
 * @ORM\Entity
 */
class CoachingCoupon
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_coupon", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCoupon;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_coaching", type="integer", nullable=true)
     */
    private $idCoaching;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin", type="date", nullable=false)
     */
    private $fin;

    /**
     * @var float
     *
     * @ORM\Column(name="discount", type="float", precision=10, scale=0, nullable=false)
     */
    private $discount;

    /**
     * @var int
     *
     * @ORM\Column(name="nbre_limite", type="integer", nullable=false)
     */
    private $nbreLimite;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateOperation = 'CURRENT_TIMESTAMP';

    public function getIdCoupon(): ?int
    {
        return $this->idCoupon;
    }

    public function getIdCoaching(): ?int
    {
        return $this->idCoaching;
    }

    public function setIdCoaching(?int $idCoaching): self
    {
        $this->idCoaching = $idCoaching;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

        return $this;
    }

    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    public function setDiscount(float $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getNbreLimite(): ?int
    {
        return $this->nbreLimite;
    }

    public function setNbreLimite(int $nbreLimite): self
    {
        $this->nbreLimite = $nbreLimite;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateOperation(): ?\DateTimeInterface
    {
        return $this->dateOperation;
    }

    public function setDateOperation(?\DateTimeInterface $dateOperation): self
    {
        $this->dateOperation = $dateOperation;

        return $this;
    }


}
