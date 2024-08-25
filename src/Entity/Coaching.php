<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Coaching
 *
 * @ORM\Table(name="coaching")
 * @ORM\Entity
 */
class Coaching
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="code_coaching", type="bigint", nullable=true)
     */
    private $codeCoaching;

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
     * @var string|null
     *
     * @ORM\Column(name="video_descriptive", type="string", length=200, nullable=true)
     */
    private $videoDescriptive;

    /**
     * @var string
     *
     * @ORM\Column(name="periode", type="string", length=100, nullable=false)
     */
    private $periode;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_contributor", type="integer", nullable=true)
     */
    private $idContributor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="langue", type="string", length=50, nullable=true)
     */
    private $langue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="level", type="string", length=100, nullable=true)
     */
    private $level;

    /**
     * @var int|null
     *
     * @ORM\Column(name="categorie", type="integer", nullable=true)
     */
    private $categorie;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sous_categorie", type="integer", nullable=true)
     */
    private $sousCategorie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sous_categorie3", type="text", length=65535, nullable=true)
     */
    private $sousCategorie3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sous_categorie4", type="text", length=65535, nullable=true)
     */
    private $sousCategorie4;

    /**
     * @var string|null
     *
     * @ORM\Column(name="skills_required", type="text", length=0, nullable=true)
     */
    private $skillsRequired;

    /**
     * @var string
     *
     * @ORM\Column(name="skills_provided", type="text", length=0, nullable=false)
     */
    private $skillsProvided;

    /**
     * @var float|null
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=true)
     */
    private $prix;

    /**
     * @var float
     *
     * @ORM\Column(name="hourly_rate", type="float", precision=10, scale=0, nullable=false)
     */
    private $hourlyRate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prix_unite", type="string", length=50, nullable=true)
     */
    private $prixUnite;

    /**
     * @var float|null
     *
     * @ORM\Column(name="discount", type="float", precision=10, scale=0, nullable=true)
     */
    private $discount;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_debut_discount", type="datetime", nullable=true)
     */
    private $dateDebutDiscount;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_fin_discount", type="datetime", nullable=true)
     */
    private $dateFinDiscount;

    /**
     * @var int|null
     *
     * @ORM\Column(name="published", type="integer", nullable=true)
     */
    private $published;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="published_date_debut", type="datetime", nullable=true)
     */
    private $publishedDateDebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_insertion", type="datetime", nullable=true)
     */
    private $dateInsertion;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_last_update", type="datetime", nullable=true)
     */
    private $dateLastUpdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateOperation = 'CURRENT_TIMESTAMP';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeCoaching(): ?string
    {
        return $this->codeCoaching;
    }

    public function setCodeCoaching(?string $codeCoaching): self
    {
        $this->codeCoaching = $codeCoaching;

        return $this;
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

    public function getVideoDescriptive(): ?string
    {
        return $this->videoDescriptive;
    }

    public function setVideoDescriptive(?string $videoDescriptive): self
    {
        $this->videoDescriptive = $videoDescriptive;

        return $this;
    }

    public function getPeriode(): ?string
    {
        return $this->periode;
    }

    public function setPeriode(string $periode): self
    {
        $this->periode = $periode;

        return $this;
    }

    public function getIdContributor(): ?int
    {
        return $this->idContributor;
    }

    public function setIdContributor(?int $idContributor): self
    {
        $this->idContributor = $idContributor;

        return $this;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(?string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(?string $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getCategorie(): ?int
    {
        return $this->categorie;
    }

    public function setCategorie(?int $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getSousCategorie(): ?int
    {
        return $this->sousCategorie;
    }

    public function setSousCategorie(?int $sousCategorie): self
    {
        $this->sousCategorie = $sousCategorie;

        return $this;
    }

    public function getSousCategorie3(): ?string
    {
        return $this->sousCategorie3;
    }

    public function setSousCategorie3(?string $sousCategorie3): self
    {
        $this->sousCategorie3 = $sousCategorie3;

        return $this;
    }

    public function getSousCategorie4(): ?string
    {
        return $this->sousCategorie4;
    }

    public function setSousCategorie4(?string $sousCategorie4): self
    {
        $this->sousCategorie4 = $sousCategorie4;

        return $this;
    }

    public function getSkillsRequired(): ?string
    {
        return $this->skillsRequired;
    }

    public function setSkillsRequired(?string $skillsRequired): self
    {
        $this->skillsRequired = $skillsRequired;

        return $this;
    }

    public function getSkillsProvided(): ?string
    {
        return $this->skillsProvided;
    }

    public function setSkillsProvided(string $skillsProvided): self
    {
        $this->skillsProvided = $skillsProvided;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getHourlyRate(): ?float
    {
        return $this->hourlyRate;
    }

    public function setHourlyRate(float $hourlyRate): self
    {
        $this->hourlyRate = $hourlyRate;

        return $this;
    }

    public function getPrixUnite(): ?string
    {
        return $this->prixUnite;
    }

    public function setPrixUnite(?string $prixUnite): self
    {
        $this->prixUnite = $prixUnite;

        return $this;
    }

    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    public function setDiscount(?float $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getDateDebutDiscount(): ?\DateTimeInterface
    {
        return $this->dateDebutDiscount;
    }

    public function setDateDebutDiscount(?\DateTimeInterface $dateDebutDiscount): self
    {
        $this->dateDebutDiscount = $dateDebutDiscount;

        return $this;
    }

    public function getDateFinDiscount(): ?\DateTimeInterface
    {
        return $this->dateFinDiscount;
    }

    public function setDateFinDiscount(?\DateTimeInterface $dateFinDiscount): self
    {
        $this->dateFinDiscount = $dateFinDiscount;

        return $this;
    }

    public function getPublished(): ?int
    {
        return $this->published;
    }

    public function setPublished(?int $published): self
    {
        $this->published = $published;

        return $this;
    }

    public function getPublishedDateDebut(): ?\DateTimeInterface
    {
        return $this->publishedDateDebut;
    }

    public function setPublishedDateDebut(?\DateTimeInterface $publishedDateDebut): self
    {
        $this->publishedDateDebut = $publishedDateDebut;

        return $this;
    }

    public function getDateInsertion(): ?\DateTimeInterface
    {
        return $this->dateInsertion;
    }

    public function setDateInsertion(?\DateTimeInterface $dateInsertion): self
    {
        $this->dateInsertion = $dateInsertion;

        return $this;
    }

    public function getDateLastUpdate(): ?\DateTimeInterface
    {
        return $this->dateLastUpdate;
    }

    public function setDateLastUpdate(?\DateTimeInterface $dateLastUpdate): self
    {
        $this->dateLastUpdate = $dateLastUpdate;

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


}
