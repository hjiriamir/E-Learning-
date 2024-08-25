<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * ContributorEducation
 *
 * @ORM\Table(name="contributor_education")
 * @ORM\Entity
 */
class ContributorEducation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_education", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEducation;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="universite", type="string", length=255, nullable=false)
     */
    private $universite;

    /**
     * @var string
     *
     * @ORM\Column(name="diplome", type="string", length=255, nullable=false)
     */
    private $diplome;

    /**
     * @var string
     *
     * @ORM\Column(name="type_diplome", type="string", length=255, nullable=false)
     */
    private $typeDiplome;

    /**
     * @var string
     *
     * @ORM\Column(name="domaine", type="string", length=255, nullable=false)
     */
    private $domaine;

    /**
     * @var string
     *
     * @ORM\Column(name="date_deb", type="string", length=7, nullable=false)
     */
    private $dateDeb;

    /**
     * @var string
     *
     * @ORM\Column(name="date_fin", type="string", length=7, nullable=false)
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="diplome_path", type="string", length=255, nullable=false)
     */
    private $diplomePath;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateOperation = 'CURRENT_TIMESTAMP';

    public function getIdEducation(): ?int
    {
        return $this->idEducation;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getUniversite(): ?string
    {
        return $this->universite;
    }

    public function setUniversite(string $universite): self
    {
        $this->universite = $universite;

        return $this;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(string $diplome): self
    {
        $this->diplome = $diplome;

        return $this;
    }

    public function getTypeDiplome(): ?string
    {
        return $this->typeDiplome;
    }

    public function setTypeDiplome(string $typeDiplome): self
    {
        $this->typeDiplome = $typeDiplome;

        return $this;
    }

    public function getDomaine(): ?string
    {
        return $this->domaine;
    }

    public function setDomaine(string $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getDateDeb(): ?string
    {
        return $this->dateDeb;
    }

    public function setDateDeb(string $dateDeb): self
    {
        $this->dateDeb = $dateDeb;

        return $this;
    }

    public function getDateFin(): ?string
    {
        return $this->dateFin;
    }

    public function setDateFin(string $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getDiplomePath(): ?string
    {
        return $this->diplomePath;
    }

    public function setDiplomePath(string $diplomePath): self
    {
        $this->diplomePath = $diplomePath;

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
