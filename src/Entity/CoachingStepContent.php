<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CoachingStepContent
 *
 * @ORM\Table(name="coaching_step_content", indexes={@ORM\Index(name="IDX_C88163FD1FFAD038", columns={"id_step"})})
 * @ORM\Entity
 */
class CoachingStepContent
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_content", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idContent;

    /**
     * @var int
     *
     * @ORM\Column(name="id_step", type="integer", nullable=false)
     */
    private $idStep;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=200, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=200, nullable=false)
     */
    private $description;

    /**
     * @var int|null
     *
     * @ORM\Column(name="finish_deadline", type="integer", nullable=true)
     */
    private $finishDeadline;

    /**
     * @var float|null
     *
     * @ORM\Column(name="required_score", type="float", precision=10, scale=0, nullable=true)
     */
    private $requiredScore;

    /**
     * @var int
     *
     * @ORM\Column(name="tentative", type="integer", nullable=false)
     */
    private $tentative = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="dure", type="float", precision=10, scale=0, nullable=false)
     */
    private $dure;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ordre", type="integer", nullable=true)
     */
    private $ordre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="show_correction", type="integer", nullable=true)
     */
    private $showCorrection;

    /**
     * @var string
     *
     * @ORM\Column(name="preview", type="string", length=100, nullable=false)
     */
    private $preview;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_type", type="integer", nullable=true)
     */
    private $idType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=false)
     */
    private $dateOperation;

    public function getIdContent(): ?int
    {
        return $this->idContent;
    }

    public function getIdStep(): ?int
    {
        return $this->idStep;
    }

    public function setIdStep(int $idStep): self
    {
        $this->idStep = $idStep;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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

    public function getFinishDeadline(): ?int
    {
        return $this->finishDeadline;
    }

    public function setFinishDeadline(?int $finishDeadline): self
    {
        $this->finishDeadline = $finishDeadline;

        return $this;
    }

    public function getRequiredScore(): ?float
    {
        return $this->requiredScore;
    }

    public function setRequiredScore(?float $requiredScore): self
    {
        $this->requiredScore = $requiredScore;

        return $this;
    }

    public function getTentative(): ?int
    {
        return $this->tentative;
    }

    public function setTentative(int $tentative): self
    {
        $this->tentative = $tentative;

        return $this;
    }

    public function getDure(): ?float
    {
        return $this->dure;
    }

    public function setDure(float $dure): self
    {
        $this->dure = $dure;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

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

    public function getShowCorrection(): ?int
    {
        return $this->showCorrection;
    }

    public function setShowCorrection(?int $showCorrection): self
    {
        $this->showCorrection = $showCorrection;

        return $this;
    }

    public function getPreview(): ?string
    {
        return $this->preview;
    }

    public function setPreview(string $preview): self
    {
        $this->preview = $preview;

        return $this;
    }

    public function getIdType(): ?int
    {
        return $this->idType;
    }

    public function setIdType(?int $idType): self
    {
        $this->idType = $idType;

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
