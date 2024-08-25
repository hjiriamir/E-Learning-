<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CoursQuizQuestionOption
 *
 * @ORM\Table(name="cours_quiz_question_option", indexes={@ORM\Index(name="IDX_132176B7E62CA5DB", columns={"id_question"})})
 * @ORM\Entity
 */
class CoursQuizQuestionOption
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_option", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOption;

    /**
     * @var int
     *
     * @ORM\Column(name="id_question", type="integer", nullable=false)
     */
    private $idQuestion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="option_val", type="string", length=200, nullable=true)
     */
    private $optionVal;

    /**
     * @var int|null
     *
     * @ORM\Column(name="reponse_true_false", type="integer", nullable=true)
     */
    private $reponseTrueFalse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateOperation = 'CURRENT_TIMESTAMP';

    public function getIdOption(): ?int
    {
        return $this->idOption;
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

    public function getOptionVal(): ?string
    {
        return $this->optionVal;
    }

    public function setOptionVal(?string $optionVal): self
    {
        $this->optionVal = $optionVal;

        return $this;
    }

    public function getReponseTrueFalse(): ?int
    {
        return $this->reponseTrueFalse;
    }

    public function setReponseTrueFalse(?int $reponseTrueFalse): self
    {
        $this->reponseTrueFalse = $reponseTrueFalse;

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
