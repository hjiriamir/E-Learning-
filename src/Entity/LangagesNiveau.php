<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LangagesNiveau
 *
 * @ORM\Table(name="langages_niveau")
 * @ORM\Entity
 */
class LangagesNiveau
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
     * @var int
     *
     * @ORM\Column(name="id_langage", type="integer", nullable=false)
     */
    private $idLangage;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=4, nullable=false)
     */
    private $label;

    public function getIdNiveau(): ?int
    {
        return $this->idNiveau;
    }

    public function getIdLangage(): ?int
    {
        return $this->idLangage;
    }

    public function setIdLangage(int $idLangage): self
    {
        $this->idLangage = $idLangage;

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
