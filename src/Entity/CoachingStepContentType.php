<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoachingStepContentType
 *
 * @ORM\Table(name="coaching_step_content_type")
 * @ORM\Entity
 */
class CoachingStepContentType
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
     * @ORM\Column(name="label", type="string", length=200, nullable=false)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="icone", type="string", length=255, nullable=false)
     */
    private $icone;

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

    public function getIcone(): ?string
    {
        return $this->icone;
    }

    public function setIcone(string $icone): self
    {
        $this->icone = $icone;

        return $this;
    }


}
