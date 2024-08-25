<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContributorCurrentSituation
 *
 * @ORM\Table(name="contributor_current_situation")
 * @ORM\Entity
 */
class ContributorCurrentSituation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_current_situation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCurrentSituation;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=false)
     */
    private $label;

    public function getIdCurrentSituation(): ?int
    {
        return $this->idCurrentSituation;
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
