<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CoursPackage
 *
 * @ORM\Table(name="cours_package", indexes={@ORM\Index(name="IDX_9D6E0EEE134FCDAC", columns={"id_cours"})})
 * @ORM\Entity
 */
class CoursPackage
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
     * @ORM\Column(name="id_cours", type="integer", nullable=false)
     */
    private $idCours;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type_item", type="string", length=255, nullable=true)
     */
    private $typeItem;

    /**
     * @var string
     *
     * @ORM\Column(name="Id", type="string", length=255, nullable=false)
     */
    private $id;

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

    public function getIdCours(): ?int
    {
        return $this->idCours;
    }

    public function setIdCours(int $idCours): self
    {
        $this->idCours = $idCours;

        return $this;
    }

    public function getTypeItem(): ?string
    {
        return $this->typeItem;
    }

    public function setTypeItem(?string $typeItem): self
    {
        $this->typeItem = $typeItem;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

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
