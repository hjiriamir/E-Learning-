<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CoachingCententTestQuestion
 *
 * @ORM\Table(name="coaching_centent_test_question", indexes={@ORM\Index(name="IDX_81E4C663205899D9", columns={"id_content"})})
 * @ORM\Entity
 */
class CoachingCententTestQuestion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_question", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idQuestion;

    /**
     * @var int
     *
     * @ORM\Column(name="id_content", type="integer", nullable=false)
     */
    private $idContent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="question", type="string", length=200, nullable=true)
     */
    private $question;

    /**
     * @var string|null
     *
     * @ORM\Column(name="explanation", type="string", length=200, nullable=true)
     */
    private $explanation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="skils", type="string", length=200, nullable=true)
     */
    private $skils;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ordre", type="integer", nullable=true)
     */
    private $ordre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="random_option", type="integer", nullable=true)
     */
    private $randomOption;

    /**
     * @var int|null
     *
     * @ORM\Column(name="random_question", type="integer", nullable=true)
     */
    private $randomQuestion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reponse_ture", type="string", length=100, nullable=true)
     */
    private $reponseTure;

    /**
     * @var string|null
     *
     * @ORM\Column(name="true_false", type="string", length=100, nullable=true)
     */
    private $trueFalse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Qa_Reponse_Text", type="string", length=100, nullable=true)
     */
    private $qaReponseText;

    /**
     * @var int|null
     *
     * @ORM\Column(name="type_test", type="integer", nullable=true)
     */
    private $typeTest;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateOperation = 'CURRENT_TIMESTAMP';

    public function getIdQuestion(): ?int
    {
        return $this->idQuestion;
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

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(?string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getExplanation(): ?string
    {
        return $this->explanation;
    }

    public function setExplanation(?string $explanation): self
    {
        $this->explanation = $explanation;

        return $this;
    }

    public function getSkils(): ?string
    {
        return $this->skils;
    }

    public function setSkils(?string $skils): self
    {
        $this->skils = $skils;

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

    public function getRandomOption(): ?int
    {
        return $this->randomOption;
    }

    public function setRandomOption(?int $randomOption): self
    {
        $this->randomOption = $randomOption;

        return $this;
    }

    public function getRandomQuestion(): ?int
    {
        return $this->randomQuestion;
    }

    public function setRandomQuestion(?int $randomQuestion): self
    {
        $this->randomQuestion = $randomQuestion;

        return $this;
    }

    public function getReponseTure(): ?string
    {
        return $this->reponseTure;
    }

    public function setReponseTure(?string $reponseTure): self
    {
        $this->reponseTure = $reponseTure;

        return $this;
    }

    public function getTrueFalse(): ?string
    {
        return $this->trueFalse;
    }

    public function setTrueFalse(?string $trueFalse): self
    {
        $this->trueFalse = $trueFalse;

        return $this;
    }

    public function getQaReponseText(): ?string
    {
        return $this->qaReponseText;
    }

    public function setQaReponseText(?string $qaReponseText): self
    {
        $this->qaReponseText = $qaReponseText;

        return $this;
    }

    public function getTypeTest(): ?int
    {
        return $this->typeTest;
    }

    public function setTypeTest(?int $typeTest): self
    {
        $this->typeTest = $typeTest;

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
