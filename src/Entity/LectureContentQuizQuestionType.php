<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LectureContentQuizQuestionType
 *
 * @ORM\Table(name="lecture_content_quiz_question_type")
 * @ORM\Entity
 */
class LectureContentQuizQuestionType
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_type_question", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypeQuestion;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=100, nullable=false)
     */
    private $label;

    public function getIdTypeQuestion(): ?int
    {
        return $this->idTypeQuestion;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }


}