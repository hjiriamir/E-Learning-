<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CoursCollaboration
 *
 * @ORM\Table(name="cours_collaboration")
 * @ORM\Entity
 */
class CoursCollaboration
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
     * @ORM\Column(name="id_user_proprietaire", type="integer", nullable=true)
     */
    private $idUserProprietaire;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_user_collaborateur", type="integer", nullable=true)
     */
    private $idUserCollaborateur;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_cours", type="integer", nullable=true)
     */
    private $idCours;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_debut", type="datetime", nullable=true)
     */
    private $dateDebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_fin", type="datetime", nullable=true)
     */
    private $dateFin;

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

    public function getIdUserProprietaire(): ?int
    {
        return $this->idUserProprietaire;
    }

    public function setIdUserProprietaire(?int $idUserProprietaire): self
    {
        $this->idUserProprietaire = $idUserProprietaire;

        return $this;
    }

    public function getIdUserCollaborateur(): ?int
    {
        return $this->idUserCollaborateur;
    }

    public function setIdUserCollaborateur(?int $idUserCollaborateur): self
    {
        $this->idUserCollaborateur = $idUserCollaborateur;

        return $this;
    }

    public function getIdCours(): ?int
    {
        return $this->idCours;
    }

    public function setIdCours(?int $idCours): self
    {
        $this->idCours = $idCours;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

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
