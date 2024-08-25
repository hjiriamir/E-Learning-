<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * TimeZone
 *
 * @ORM\Table(name="time_zone", indexes={@ORM\Index(name="idx_zone_name", columns={"zone_name"}), @ORM\Index(name="idx_country_code", columns={"country_code"}), @ORM\Index(name="idx_time_start", columns={"time_start"})})
 * @ORM\Entity
 */
class TimeZone
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_time", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTime;

    /**
     * @var string
     *
     * @ORM\Column(name="zone_name", type="string", length=35, nullable=false)
     */
    private $zoneName;

    /**
     * @var string
     *
     * @ORM\Column(name="country_code", type="string", length=2, nullable=false, options={"fixed"=true})
     */
    private $countryCode;

    /**
     * @var string
     *
     * @ORM\Column(name="abbreviation", type="string", length=6, nullable=false)
     */
    private $abbreviation;

    /**
     * @var string
     *
     * @ORM\Column(name="time_start", type="decimal", precision=11, scale=0, nullable=false)
     */
    private $timeStart;

    /**
     * @var int
     *
     * @ORM\Column(name="gmt_offset", type="integer", nullable=false)
     */
    private $gmtOffset;

    /**
     * @var string
     *
     * @ORM\Column(name="dst", type="string", length=1, nullable=false, options={"fixed"=true})
     */
    private $dst;

    public function getIdTime(): ?int
    {
        return $this->idTime;
    }

    public function getZoneName(): ?string
    {
        return $this->zoneName;
    }

    public function setZoneName(string $zoneName): self
    {
        $this->zoneName = $zoneName;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getAbbreviation(): ?string
    {
        return $this->abbreviation;
    }

    public function setAbbreviation(string $abbreviation): self
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    public function getTimeStart(): ?string
    {
        return $this->timeStart;
    }

    public function setTimeStart(string $timeStart): self
    {
        $this->timeStart = $timeStart;

        return $this;
    }

    public function getGmtOffset(): ?int
    {
        return $this->gmtOffset;
    }

    public function setGmtOffset(int $gmtOffset): self
    {
        $this->gmtOffset = $gmtOffset;

        return $this;
    }

    public function getDst(): ?string
    {
        return $this->dst;
    }

    public function setDst(string $dst): self
    {
        $this->dst = $dst;

        return $this;
    }


}
