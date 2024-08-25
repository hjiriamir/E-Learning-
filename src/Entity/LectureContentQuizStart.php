<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * LectureContentQuizStart
 *
 * @ORM\Table(name="lecture_content_quiz_start")
 * @ORM\Entity
 */
class LectureContentQuizStart
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_start", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStart;

    /**
     * @var int
     *
     * @ORM\Column(name="id_tentative", type="integer", nullable=false)
     */
    private $idTentative;

    /**
     * @var int
     *
     * @ORM\Column(name="id_content", type="integer", nullable=false)
     */
    private $idContent;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

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

    public function getIdStart(): ?int
    {
        return $this->idStart;
    }

    public function getIdTentative(): ?int
    {
        return $this->idTentative;
    }

    public function setIdTentative(int $idTentative): self
    {
        $this->idTentative = $idTentative;

        return $this;
    }

    public function getIdContent(): ?int
    {
        return $this->idContent;
    }

    public function setIdContent(int $idContent): self
    {
        $this->idContent = $idContent;

        return $this;
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
