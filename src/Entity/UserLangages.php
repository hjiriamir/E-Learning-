<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserLangages
 *
 * @ORM\Table(name="user_langages")
 * @ORM\Entity
 */
class UserLangages
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_langage", type="integer", nullable=false)
     */
    private $idLangage;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var int
     *
     * @ORM\Column(name="id_niveau", type="integer", nullable=false)
     */
    private $idNiveau;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdNiveau(): ?int
    {
        return $this->idNiveau;
    }

    public function setIdNiveau(int $idNiveau): self
    {
        $this->idNiveau = $idNiveau;

        return $this;
    }


}
