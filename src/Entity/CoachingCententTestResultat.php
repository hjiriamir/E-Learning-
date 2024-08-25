<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CoachingCententTestResultat
 *
 * @ORM\Table(name="coaching_centent_test_resultat")
 * @ORM\Entity
 */
class CoachingCententTestResultat
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_res", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRes;

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
     * @var string
     *
     * @ORM\Column(name="score", type="string", length=200, nullable=false)
     */
    private $score;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=100, nullable=false)
     */
    private $note;

    /**
     * @var int
     *
     * @ORM\Column(name="id_tentative", type="integer", nullable=false)
     */
    private $idTentative;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateOperation = 'CURRENT_TIMESTAMP';

    public function getIdRes(): ?int
    {
        return $this->idRes;
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

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(string $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
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
