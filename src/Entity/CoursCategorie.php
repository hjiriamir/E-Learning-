<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoursCategorie
 *
 * @ORM\Table(name="cours_categorie")
 * @ORM\Entity
 */
class CoursCategorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_categorie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=50, nullable=false)
     */
    private $label;

    public function getIdCategorie(): ?int
    {
        return $this->idCategorie;
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
