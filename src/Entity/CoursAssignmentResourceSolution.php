<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * CoursAssignmentResourceSolution
 *
 * @ORM\Table(name="cours_assignment_resource_solution", indexes={@ORM\Index(name="IDX_B46CFDEA205899D9", columns={"id_content"})})
 * @ORM\Entity
 */
class CoursAssignmentResourceSolution
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_resource", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idResource;

    /**
     * @var string|null
     *
     * @ORM\Column(name="path", type="text", length=65535, nullable=true)
     */
    private $path;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_type_doc", type="integer", nullable=true)
     */
    private $idTypeDoc;

    /**
     * @var int
     *
     * @ORM\Column(name="Solutions_Instructions", type="bigint", nullable=false)
     */
    private $solutionsInstructions;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=true)
     */
    private $dateOperation;

    /**
     * @var \LectureContent
     *
     * @ORM\ManyToOne(targetEntity="LectureContent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_content", referencedColumnName="id_content")
     * })
     */
    private $idContent;

    public function getIdResource(): ?int
    {
        return $this->idResource;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getIdTypeDoc(): ?int
    {
        return $this->idTypeDoc;
    }

    public function setIdTypeDoc(?int $idTypeDoc): self
    {
        $this->idTypeDoc = $idTypeDoc;

        return $this;
    }

    public function getSolutionsInstructions(): ?string
    {
        return $this->solutionsInstructions;
    }

    public function setSolutionsInstructions(string $solutionsInstructions): self
    {
        $this->solutionsInstructions = $solutionsInstructions;

        return $this;
    }

    public function getDateOperation(): ?\DateTimeInterface
    {
        return $this->dateOperation;
    }

    public function setDateOperation(?\DateTimeInterface $dateOperation): self
    {
        $this->dateOperation = $dateOperation;

        return $this;
    }

    public function getIdContent(): ?LectureContent
    {
        return $this->idContent;
    }

    public function setIdContent(?LectureContent $idContent): self
    {
        $this->idContent = $idContent;

        return $this;
    }


}
