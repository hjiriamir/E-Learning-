<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoursType
 *
 * @ORM\Table(name="cours_type")
 * @ORM\Entity
 */
class CoursType
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_type", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idType;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=50, nullable=false)
     */
    private $label;

    public function getIdType(): ?int
    {
        return $this->idType;
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
