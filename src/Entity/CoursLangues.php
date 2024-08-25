<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoursLangues
 *
 * @ORM\Table(name="cours_langues")
 * @ORM\Entity
 */
class CoursLangues
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_Langue", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLangue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="label", type="string", length=50, nullable=true)
     */
    private $label;

    public function getIdLangue(): ?int
    {
        return $this->idLangue;
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
