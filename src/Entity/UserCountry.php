<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserCountry
 *
 * @ORM\Table(name="user_country")
 * @ORM\Entity
 */
class UserCountry
{
    /**
     * @var int
     *
     * @ORM\Column(name="contributor_id_country", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $contributorIdCountry;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=100, nullable=false)
     */
    private $label;

    public function getContributorIdCountry(): ?int
    {
        return $this->contributorIdCountry;
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
