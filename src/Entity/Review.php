<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Review
 *
 * @ORM\Table(name="review")
 * @ORM\Entity
 */
class Review
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
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=200, nullable=true)
     */
    private $username;

    /**
     * @var float|null
     *
     * @ORM\Column(name="faithfulness_to_the_description", type="float", precision=10, scale=0, nullable=true)
     */
    private $faithfulnessToTheDescription;

    /**
     * @var float|null
     *
     * @ORM\Column(name="content_quality", type="float", precision=10, scale=0, nullable=true)
     */
    private $contentQuality;

    /**
     * @var float|null
     *
     * @ORM\Column(name="course_organization", type="float", precision=10, scale=0, nullable=true)
     */
    private $courseOrganization;

    /**
     * @var float|null
     *
     * @ORM\Column(name="explanation_method", type="float", precision=10, scale=0, nullable=true)
     */
    private $explanationMethod;

    /**
     * @var float|null
     *
     * @ORM\Column(name="students_feedback", type="float", precision=10, scale=0, nullable=true)
     */
    private $studentsFeedback;

    /**
     * @var float|null
     *
     * @ORM\Column(name="overall_average", type="float", precision=10, scale=0, nullable=true)
     */
    private $overallAverage;

    /**
     * @var float|null
     *
     * @ORM\Column(name="Reactivity_on_Forum", type="float", precision=10, scale=0, nullable=true)
     */
    private $reactivityOnForum;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getFaithfulnessToTheDescription(): ?float
    {
        return $this->faithfulnessToTheDescription;
    }

    public function setFaithfulnessToTheDescription(?float $faithfulnessToTheDescription): self
    {
        $this->faithfulnessToTheDescription = $faithfulnessToTheDescription;

        return $this;
    }

    public function getContentQuality(): ?float
    {
        return $this->contentQuality;
    }

    public function setContentQuality(?float $contentQuality): self
    {
        $this->contentQuality = $contentQuality;

        return $this;
    }

    public function getCourseOrganization(): ?float
    {
        return $this->courseOrganization;
    }

    public function setCourseOrganization(?float $courseOrganization): self
    {
        $this->courseOrganization = $courseOrganization;

        return $this;
    }

    public function getExplanationMethod(): ?float
    {
        return $this->explanationMethod;
    }

    public function setExplanationMethod(?float $explanationMethod): self
    {
        $this->explanationMethod = $explanationMethod;

        return $this;
    }

    public function getStudentsFeedback(): ?float
    {
        return $this->studentsFeedback;
    }

    public function setStudentsFeedback(?float $studentsFeedback): self
    {
        $this->studentsFeedback = $studentsFeedback;

        return $this;
    }

    public function getOverallAverage(): ?float
    {
        return $this->overallAverage;
    }

    public function setOverallAverage(?float $overallAverage): self
    {
        $this->overallAverage = $overallAverage;

        return $this;
    }

    public function getReactivityOnForum(): ?float
    {
        return $this->reactivityOnForum;
    }

    public function setReactivityOnForum(?float $reactivityOnForum): self
    {
        $this->reactivityOnForum = $reactivityOnForum;

        return $this;
    }


}
