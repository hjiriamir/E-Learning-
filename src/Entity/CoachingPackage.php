<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CoachingPackage
 *
 * @ORM\Table(name="coaching_package", indexes={@ORM\Index(name="IDX_9D6E0EEE134FCDAC", columns={"id_cours_or_coaching"})})
 * @ORM\Entity
 */
class CoachingPackage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_package", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPackage;

    /**
     * @var int
     *
     * @ORM\Column(name="id_coaching", type="integer", nullable=false)
     */
    private $idCoaching;

    /**
     * @var int
     *
     * @ORM\Column(name="id_cours_or_coaching", type="integer", nullable=false)
     */
    private $idCoursOrCoaching;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="discount", type="string", length=255, nullable=false)
     */
    private $discount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateOperation = 'CURRENT_TIMESTAMP';

    public function getIdPackage(): ?int
    {
        return $this->idPackage;
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

    public function getIdCoursOrCoaching(): ?int
    {
        return $this->idCoursOrCoaching;
    }

    public function setIdCoursOrCoaching(int $idCoursOrCoaching): self
    {
        $this->idCoursOrCoaching = $idCoursOrCoaching;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDiscount(): ?string
    {
        return $this->discount;
    }

    public function setDiscount(string $discount): self
    {
        $this->discount = $discount;

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
