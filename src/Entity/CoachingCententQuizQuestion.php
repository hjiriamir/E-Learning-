<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CoachingCententQuizQuestion
 *
 * @ORM\Table(name="coaching_centent_quiz_question")
 * @ORM\Entity
 */
class CoachingCententQuizQuestion
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
     * @var int|null
     *
     * @ORM\Column(name="id_content", type="integer", nullable=true)
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
     * @ORM\Column(name="knowledge", type="string", length=200, nullable=true)
     */
    private $knowledge;

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
     * @ORM\Column(name="random", type="integer", nullable=true)
     */
    private $random;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reponse_ture", type="string", length=100, nullable=true)
     */
    private $reponseTure;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_type_question", type="integer", nullable=true)
     */
    private $idTypeQuestion;

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

    public function setIdContent(?int $idContent): self
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

    public function getKnowledge(): ?string
    {
        return $this->knowledge;
    }

    public function setKnowledge(?string $knowledge): self
    {
        $this->knowledge = $knowledge;

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

    public function getRandom(): ?int
    {
        return $this->random;
    }

    public function setRandom(?int $random): self
    {
        $this->random = $random;

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

    public function getIdTypeQuestion(): ?int
    {
        return $this->idTypeQuestion;
    }

    public function setIdTypeQuestion(?int $idTypeQuestion): self
    {
        $this->idTypeQuestion = $idTypeQuestion;

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
