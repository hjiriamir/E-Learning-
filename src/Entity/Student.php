<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity
 */
class Student
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_student", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStudent;

    /**
     * @var int|null
     *
     * @ORM\Column(name="signaler", type="integer", nullable=true)
     */
    private $signaler;

    /**
     * @var string|null
     *
     * @ORM\Column(name="video_descriptive", type="string", length=200, nullable=true)
     */
    private $videoDescriptive;

    public function getIdStudent(): ?int
    {
        return $this->idStudent;
    }

    public function getSignaler(): ?int
    {
        return $this->signaler;
    }

    public function setSignaler(?int $signaler): self
    {
        $this->signaler = $signaler;

        return $this;
    }

    public function getVideoDescriptive(): ?string
    {
        return $this->videoDescriptive;
    }

    public function setVideoDescriptive(?string $videoDescriptive): self
    {
        $this->videoDescriptive = $videoDescriptive;

        return $this;
    }


}
