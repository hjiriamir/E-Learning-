<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contributor
 *
 * @ORM\Table(name="contributor", indexes={@ORM\Index(name="IDX_5CF318446B3CA4B", columns={"id_user"})})
 * @ORM\Entity
 */
class Contributor
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
     * @var int
     *
     * @ORM\Column(name="cin", type="integer", nullable=false)
     */
    private $cin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cv", type="string", length=255, nullable=true)
     */
    private $cv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Video_descriptif", type="string", length=255, nullable=true)
     */
    private $videoDescriptif;

    /**
     * @var string|null
     *
     * @ORM\Column(name="domaine", type="string", length=255, nullable=true)
     */
    private $domaine;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_verified", type="boolean", nullable=false)
     */
    private $isVerified;

    /**
     * @var datetime_immutable|null
     *
     * @ORM\Column(name="date_verification", type="datetime_immutable", nullable=true)
     */
    private $dateVerification;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verifier_par", type="string", length=255, nullable=true)
     */
    private $verifierPar;

    /**
     * @var int|null
     *
     * @ORM\Column(name="appartien_a_ecole", type="integer", nullable=true)
     */
    private $appartienAEcole;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imageVideo", type="string", length=255, nullable=true)
     */
    private $imagevideo;

/**
 * @var int
 *
 * @ORM\Column(type="integer")
 * @ORM\ManyToOne(targetEntity="Users")
 * @ORM\JoinColumns({
 *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
 * })
 */
private $idUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(int $cin): self
    {
        $this->cin = $cin;

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

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(?string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getVideoDescriptif(): ?string
    {
        return $this->videoDescriptif;
    }

    public function setVideoDescriptif(?string $videoDescriptif): self
    {
        $this->videoDescriptif = $videoDescriptif;

        return $this;
    }

    public function getDomaine(): ?string
    {
        return $this->domaine;
    }

    public function setDomaine(?string $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function isIsVerified(): ?bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getDateVerification(): ?\DateTimeImmutable
    {
        return $this->dateVerification;
    }

    public function setDateVerification(?\DateTimeImmutable $dateVerification): self
    {
        $this->dateVerification = $dateVerification;

        return $this;
    }

    public function getVerifierPar(): ?string
    {
        return $this->verifierPar;
    }

    public function setVerifierPar(?string $verifierPar): self
    {
        $this->verifierPar = $verifierPar;

        return $this;
    }

    public function getAppartienAEcole(): ?int
    {
        return $this->appartienAEcole;
    }

    public function setAppartienAEcole(?int $appartienAEcole): self
    {
        $this->appartienAEcole = $appartienAEcole;

        return $this;
    }

    public function getImagevideo(): ?string
    {
        return $this->imagevideo;
    }

    public function setImagevideo(?string $imagevideo): self
    {
        $this->imagevideo = $imagevideo;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(?Users $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }


}
