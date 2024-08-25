<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="country", indexes={@ORM\Index(name="idx_country_code", columns={"country_code"})})
 * @ORM\Entity
 */
class Country
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_country", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCountry;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country_code", type="string", length=2, nullable=true, options={"fixed"=true})
     */
    private $countryCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country_name", type="string", length=45, nullable=true)
     */
    private $countryName;

    public function getIdCountry(): ?int
    {
        return $this->idCountry;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getCountryName(): ?string
    {
        return $this->countryName;
    }

    public function setCountryName(?string $countryName): self
    {
        $this->countryName = $countryName;

        return $this;
    }


}
