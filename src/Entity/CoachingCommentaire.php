<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CoachingCommentaire
 *
 * @ORM\Table(name="coaching_commentaire")
 * @ORM\Entity
 */
class CoachingCommentaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_com", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCom;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true)
     */
    private $idUser;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_coaching", type="integer", nullable=true)
     */
    private $idCoaching;

    /**
     * @var string|null
     *
     * @ORM\Column(name="label", type="string", length=200, nullable=true)
     */
    private $label;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateOperation = 'CURRENT_TIMESTAMP';

    public function getIdCom(): ?int
    {
        return $this->idCom;
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

    public function getIdCoaching(): ?int
    {
        return $this->idCoaching;
    }

    public function setIdCoaching(?int $idCoaching): self
    {
        $this->idCoaching = $idCoaching;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;

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
