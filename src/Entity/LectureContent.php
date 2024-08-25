<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * LectureContent
 *
 * @ORM\Table(name="lecture_content", indexes={@ORM\Index(name="IDX_C88163FD1FFAD038", columns={"id_lecture"})})
 * @ORM\Entity
 */
class LectureContent
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
     * @ORM\Column(name="id_lecture", type="integer", nullable=false)
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
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dure", type="integer", nullable=true)
     */
    private $dure;

    /**
     * @var int|null
     *
     * @ORM\Column(name="$videoSequencing", type="integer", nullable=true)
     */
    private $videosequencing;

    /**
     * @var int|null
     *
     * @ORM\Column(name="subtitle", type="integer", nullable=true)
     */
    private $subtitle;

    /**
     * @var int|null
     *
     * @ORM\Column(name="download_video", type="integer", nullable=true)
     */
    private $downloadVideo;

    /**
     * @var float|null
     *
     * @ORM\Column(name="min_score", type="float", precision=10, scale=0, nullable=true)
     */
    private $minScore;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ordre", type="integer", nullable=true)
     */
    private $ordre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="random", type="integer", nullable=true)
     */
    private $random;

    /**
     * @var int|null
     *
     * @ORM\Column(name="show_correction", type="integer", nullable=true)
     */
    private $showCorrection;

    /**
     * @var int|null
     *
     * @ORM\Column(name="preview_document", type="integer", nullable=true)
     */
    private $previewDocument;

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

    /**
     * @var int|null
     *
     * @ORM\Column(name="etape_obligatoir", type="integer", nullable=true)
     */
    private $etapeObligatoir;

    public function getIdContent(): ?int
    {
        return $this->idContent;
    }

    public function getIdLecture(): ?int
    {
        return $this->idLecture;
    }

    public function setIdLecture(int $idLecture): self
    {
        $this->idLecture = $idLecture;

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getDure(): ?int
    {
        return $this->dure;
    }

    public function setDure(?int $dure): self
    {
        $this->dure = $dure;

        return $this;
    }

    public function getVideosequencing(): ?int
    {
        return $this->videosequencing;
    }

    public function setVideosequencing(?int $videosequencing): self
    {
        $this->videosequencing = $videosequencing;

        return $this;
    }

    public function getSubtitle(): ?int
    {
        return $this->subtitle;
    }

    public function setSubtitle(?int $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getDownloadVideo(): ?int
    {
        return $this->downloadVideo;
    }

    public function setDownloadVideo(?int $downloadVideo): self
    {
        $this->downloadVideo = $downloadVideo;

        return $this;
    }

    public function getMinScore(): ?float
    {
        return $this->minScore;
    }

    public function setMinScore(?float $minScore): self
    {
        $this->minScore = $minScore;

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

    public function getRandom(): ?int
    {
        return $this->random;
    }

    public function setRandom(?int $random): self
    {
        $this->random = $random;

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

    public function getPreviewDocument(): ?int
    {
        return $this->previewDocument;
    }

    public function setPreviewDocument(?int $previewDocument): self
    {
        $this->previewDocument = $previewDocument;

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

    public function getEtapeObligatoir(): ?int
    {
        return $this->etapeObligatoir;
    }

    public function setEtapeObligatoir(?int $etapeObligatoir): self
    {
        $this->etapeObligatoir = $etapeObligatoir;

        return $this;
    }


}
