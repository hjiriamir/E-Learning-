<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CoachingMarketplace
 *
 * @ORM\Table(name="coaching_marketplace", indexes={@ORM\Index(name="IDX_B3F4E6A134FCDAC", columns={"id_coaching"})})
 * @ORM\Entity
 */
class CoachingMarketplace
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_produit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_prod", type="string", length=200, nullable=false)
     */
    private $nomProd;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=200, nullable=false)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photo", type="text", length=0, nullable=true)
     */
    private $photo;

    /**
     * @var float|null
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=true)
     */
    private $price;

    /**
     * @var string|null
     *
     * @ORM\Column(name="price_unite", type="string", length=50, nullable=true)
     */
    private $priceUnite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=false)
     */
    private $dateOperation;

    /**
     * @var \Coaching
     *
     * @ORM\ManyToOne(targetEntity="Coaching")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_coaching", referencedColumnName="id")
     * })
     */
    private $idCoaching;

    public function getIdProduit(): ?int
    {
        return $this->idProduit;
    }

    public function getNomProd(): ?string
    {
        return $this->nomProd;
    }

    public function setNomProd(string $nomProd): self
    {
        $this->nomProd = $nomProd;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPriceUnite(): ?string
    {
        return $this->priceUnite;
    }

    public function setPriceUnite(?string $priceUnite): self
    {
        $this->priceUnite = $priceUnite;

        return $this;
    }

    public function getDateOperation(): ?\DateTimeInterface
    {
        return $this->dateOperation;
    }

    public function setDateOperation(\DateTimeInterface $dateOperation): self
    {
        $this->dateOperation = $dateOperation;

        return $this;
    }

    public function getIdCoaching(): ?Coaching
    {
        return $this->idCoaching;
    }

    public function setIdCoaching(?Coaching $idCoaching): self
    {
        $this->idCoaching = $idCoaching;

        return $this;
    }


}
