<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Langages
 *
 * @ORM\Table(name="langages")
 * @ORM\Entity
 */
class Langages
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_langage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLangage;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=50, nullable=false)
     */
    private $label;

    public function getIdLangage(): ?int
    {
        return $this->idLangage;
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
