<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CoursCoupon
 *
 * @ORM\Table(name="cours_coupon", indexes={@ORM\Index(name="IDX_B3F2E6A134FCDAC", columns={"id_cours"})})
 * @ORM\Entity
 */
class CoursCoupon
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="debut", type="date", nullable=true)
     */
    private $debut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin", type="date", nullable=false)
     */
    private $fin;

    /**
     * @var float|null
     *
     * @ORM\Column(name="prix_promo", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixPromo;

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

    /**
     * @var \CoursFinal
     *
     * @ORM\ManyToOne(targetEntity="CoursFinal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cours", referencedColumnName="id")
     * })
     */
    private $idCours;

    public function getIdCoupon(): ?int
    {
        return $this->idCoupon;
    }

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(?\DateTimeInterface $debut): self
    {
        $this->debut = $debut;

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

    public function getPrixPromo(): ?float
    {
        return $this->prixPromo;
    }

    public function setPrixPromo(?float $prixPromo): self
    {
        $this->prixPromo = $prixPromo;

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

    public function getIdCours(): ?CoursFinal
    {
        return $this->idCours;
    }

    public function setIdCours(?CoursFinal $idCours): self
    {
        $this->idCours = $idCours;

        return $this;
    }


}
