<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CoachingStep
 *
 * @ORM\Table(name="coaching_step", indexes={@ORM\Index(name="IDX_6E751394134FCDAC", columns={"id_coaching"})})
 * @ORM\Entity
 */
class CoachingStep
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_step", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStep;

    /**
     * @var int
     *
     * @ORM\Column(name="id_coaching", type="integer", nullable=false)
     */
    private $idCoaching;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=200, nullable=false)
     */
    private $titre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="skills_provided", type="string", length=200, nullable=true)
     */
    private $skillsProvided;

    /**
     * @var string
     *
     * @ORM\Column(name="you_will_learn", type="string", length=200, nullable=false)
     */
    private $youWillLearn;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ordre", type="integer", nullable=true)
     */
    private $ordre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateOperation = 'CURRENT_TIMESTAMP';

    public function getIdStep(): ?int
    {
        return $this->idStep;
    }

    public function getIdCoaching(): ?int
    {
        return $this->idCoaching;
    }

    public function setIdCoaching(int $idCoaching): self
    {
        $this->idCoaching = $idCoaching;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSkillsProvided(): ?string
    {
        return $this->skillsProvided;
    }

    public function setSkillsProvided(?string $skillsProvided): self
    {
        $this->skillsProvided = $skillsProvided;

        return $this;
    }

    public function getYouWillLearn(): ?string
    {
        return $this->youWillLearn;
    }

    public function setYouWillLearn(string $youWillLearn): self
    {
        $this->youWillLearn = $youWillLearn;

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
