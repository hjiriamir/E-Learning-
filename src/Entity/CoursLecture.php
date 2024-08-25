<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CoursLecture
 *
 * @ORM\Table(name="cours_lecture", indexes={@ORM\Index(name="IDX_82611033F3EED39F", columns={"id_section"})})
 * @ORM\Entity
 */
class CoursLecture
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_lecture", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLecture;

    /**
     * @var string|null
     *
     * @ORM\Column(name="titre", type="string", length=200, nullable=true)
     */
    private $titre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=true)
     */
    private $description;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ordre", type="integer", nullable=true)
     */
    private $ordre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="etape_obligatoir", type="integer", nullable=true)
     */
    private $etapeObligatoir;

    /**
     * @var float|null
     *
     * @ORM\Column(name="pricing", type="float", precision=10, scale=0, nullable=true)
     */
    private $pricing;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateOperation = 'CURRENT_TIMESTAMP';

   /**
     * @var int
     *
     * @ORM\Column(name="id_section", type="integer", nullable=false)
     */
    private $idSection;

    public function getIdLecture(): ?int
    {
        return $this->idLecture;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(?int $ordre): self
    {
        $this->ordre = $ordre;

        return $this;
    }

    public function getEtapeObligatoir(): ?int
    {
        return $this->etapeObligatoir;
    }

    public function setEtapeObligatoir(?int $etapeObligatoir): self
    {
        $this->etapeObligatoir = $etapeObligatoir;

        return $this;
    }

    public function getPricing(): ?float
    {
        return $this->pricing;
    }

    public function setPricing(?float $pricing): self
    {
        $this->pricing = $pricing;

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

    public function getIdSection(): ?int
    {
        return $this->idSection;
    }

    public function setIdSection(?CoursSection $idSection): self
    {
        $this->idSection = $idSection;

        return $this;
    }


}
