<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoachingCategorie3
 *
 * @ORM\Table(name="coaching_categorie_3")
 * @ORM\Entity
 */
class CoachingCategorie3
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_categ3", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCateg3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_categ2", type="integer", nullable=true)
     */
    private $idCateg2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="label", type="string", length=50, nullable=true)
     */
    private $label;

    public function getIdCateg3(): ?int
    {
        return $this->idCateg3;
    }

    public function getIdCateg2(): ?int
    {
        return $this->idCateg2;
    }

    public function setIdCateg2(?int $idCateg2): self
    {
        $this->idCateg2 = $idCateg2;

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
