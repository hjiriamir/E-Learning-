<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoachingCategorie4
 *
 * @ORM\Table(name="coaching_categorie_4")
 * @ORM\Entity
 */
class CoachingCategorie4
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_categ4", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCateg4;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_categ3", type="integer", nullable=true)
     */
    private $idCateg3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="label", type="string", length=50, nullable=true)
     */
    private $label;

    public function getIdCateg4(): ?int
    {
        return $this->idCateg4;
    }

    public function getIdCateg3(): ?int
    {
        return $this->idCateg3;
    }

    public function setIdCateg3(?int $idCateg3): self
    {
        $this->idCateg3 = $idCateg3;

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


}
