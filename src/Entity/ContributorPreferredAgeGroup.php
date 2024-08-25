<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContributorPreferredAgeGroup
 *
 * @ORM\Table(name="contributor_preferred_age_group")
 * @ORM\Entity
 */
class ContributorPreferredAgeGroup
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_preferred_age_group", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPreferredAgeGroup;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=false)
     */
    private $label;

    public function getIdPreferredAgeGroup(): ?int
    {
        return $this->idPreferredAgeGroup;
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
