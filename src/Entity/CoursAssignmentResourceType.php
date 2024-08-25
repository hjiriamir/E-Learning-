<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoursAssignmentResourceType
 *
 * @ORM\Table(name="cours_assignment_resource_type")
 * @ORM\Entity
 */
class CoursAssignmentResourceType
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_type_doc", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypeDoc;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=false)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=false)
     */
    private $icon;

    public function getIdTypeDoc(): ?int
    {
        return $this->idTypeDoc;
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

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }


}
