<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * ContributorFollowers
 *
 * @ORM\Table(name="contributor_followers")
 * @ORM\Entity
 */
class ContributorFollowers
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_follow", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFollow;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_contributor", type="integer", nullable=true)
     */
    private $idContributor;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true)
     */
    private $idUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateOperation = 'CURRENT_TIMESTAMP';

    public function getIdFollow(): ?int
    {
        return $this->idFollow;
    }

    public function getIdContributor(): ?int
    {
        return $this->idContributor;
    }

    public function setIdContributor(?int $idContributor): self
    {
        $this->idContributor = $idContributor;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(?int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getDateOperation(): ?\DateTimeInterface
    {
        return $this->dateOperation;
    }

    public function setDateOperation(\DateTimeInterface $dateOperation): self
    {
        $this->dateOperation = $dateOperation;

        return $this;
    }


}
