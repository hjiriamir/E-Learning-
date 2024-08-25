<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserTimeZone
 *
 * @ORM\Table(name="user_time_zone")
 * @ORM\Entity
 */
class UserTimeZone
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_timezone", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTimezone;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=200, nullable=false)
     */
    private $label;

    public function getIdTimezone(): ?int
    {
        return $this->idTimezone;
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
