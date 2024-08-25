<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CoachingCententQa
 *
 * @ORM\Table(name="coaching_centent_qa", indexes={@ORM\Index(name="IDX_8CBE1466134FCDAC", columns={"id_coaching"})})
 * @ORM\Entity
 */
class CoachingCententQa
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_qa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idQa;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_coaching", type="integer", nullable=true)
     */
    private $idCoaching;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true)
     */
    private $idUser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="question", type="string", length=200, nullable=true)
     */
    private $question;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reponse", type="text", length=0, nullable=true)
     */
    private $reponse;

    /**
     * @var int|null
     *
     * @ORM\Column(name="set_public", type="integer", nullable=true)
     */
    private $setPublic;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateOperation = 'CURRENT_TIMESTAMP';

    public function getIdQa(): ?int
    {
        return $this->idQa;
    }

    public function getIdCoaching(): ?int
    {
        return $this->idCoaching;
    }

    public function setIdCoaching(?int $idCoaching): self
    {
        $this->idCoaching = $idCoaching;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(?int $idUser): self
    {
        $this->idUser = $idUser;

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

    public function getReponse(): ?string
    {
        return $this->reponse;
    }

    public function setReponse(?string $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }

    public function getSetPublic(): ?int
    {
        return $this->setPublic;
    }

    public function setSetPublic(?int $setPublic): self
    {
        $this->setPublic = $setPublic;

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
