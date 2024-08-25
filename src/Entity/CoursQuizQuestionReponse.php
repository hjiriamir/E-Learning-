<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CoursQuizQuestionReponse
 *
 * @ORM\Table(name="cours_quiz_question_reponse")
 * @ORM\Entity
 */
class CoursQuizQuestionReponse
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_reponse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReponse;

    /**
     * @var int
     *
     * @ORM\Column(name="id_question", type="integer", nullable=false)
     */
    private $idQuestion;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var int
     *
     * @ORM\Column(name="tentative", type="integer", nullable=false)
     */
    private $tentative;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse", type="string", length=100, nullable=false)
     */
    private $reponse;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=true)
     */
    private $dateOperation;

    public function getIdReponse(): ?int
    {
        return $this->idReponse;
    }

    public function getIdQuestion(): ?int
    {
        return $this->idQuestion;
    }

    public function setIdQuestion(int $idQuestion): self
    {
        $this->idQuestion = $idQuestion;

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

    public function getTentative(): ?int
    {
        return $this->tentative;
    }

    public function setTentative(int $tentative): self
    {
        $this->tentative = $tentative;

        return $this;
    }

    public function getReponse(): ?string
    {
        return $this->reponse;
    }

    public function setReponse(string $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }

    public function getDateOperation(): ?\DateTimeInterface
    {
        return $this->dateOperation;
    }

    public function setDateOperation(?\DateTimeInterface $dateOperation): self
    {
        $this->dateOperation = $dateOperation;

        return $this;
    }


}
