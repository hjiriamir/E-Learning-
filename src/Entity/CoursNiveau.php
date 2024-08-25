<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoursNiveau
 *
 * @ORM\Table(name="cours_niveau")
 * @ORM\Entity
 */
class CoursNiveau
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_niveau", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNiveau;

    /**
     * @var string|null
     *
     * @ORM\Column(name="label", type="string", length=50, nullable=true)
     */
    private $label;

    public function getIdNiveau(): ?int
    {
        return $this->idNiveau;
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


}
