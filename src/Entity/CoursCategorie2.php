<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoursCategorie2
 *
 * @ORM\Table(name="cours_categorie_2")
 * @ORM\Entity
 */
class CoursCategorie2
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_categ2", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCateg2;

    /**
     * @var int
     *
     * @ORM\Column(name="id_categ", type="integer", nullable=false)
     */
    private $idCateg;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=50, nullable=false)
     */
    private $label;

    public function getIdCateg2(): ?int
    {
        return $this->idCateg2;
    }

    public function getIdCateg(): ?int
    {
        return $this->idCateg;
    }

    public function setIdCateg(int $idCateg): self
    {
        $this->idCateg = $idCateg;

        return $this;
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
