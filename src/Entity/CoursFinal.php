<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * CoursFinal
 *
 * @ORM\Table(name="cours_final")
 * @ORM\Entity
 */
class CoursFinal
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
     * @var int|null
     *
     * @ORM\Column(name="code_cours", type="bigint", nullable=true)
     */
    private $codeCours;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Forum", type="integer", nullable=true)
     */
    private $forum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="titre", type="string", length=200, nullable=true)
     */
    private $titre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sous_titre", type="string", length=200, nullable=true)
     */
    private $sousTitre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="what_to_learn", type="text", length=65535, nullable=true)
     */
    private $whatToLearn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="requirement_prerequis", type="text", length=65535, nullable=true)
     */
    private $requirementPrerequis;

    /**
     * @var string|null
     *
     * @ORM\Column(name="for_who_is_this_cours", type="text", length=65535, nullable=true)
     */
    private $forWhoIsThisCours;

    /**
     * @var int|null
     *
     * @ORM\Column(name="certification", type="integer", nullable=true)
     */
    private $certification;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image_cours", type="string", length=200, nullable=true)
     */
    private $imageCours;

    /**
     * @var string|null
     *
     * @ORM\Column(name="video_descriptive", type="string", length=200, nullable=true)
     */
    private $videoDescriptive;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_contributor", type="integer", nullable=true)
     */
    private $idContributor;

    /**
     * @var int|null
     *
     * @ORM\Column(name="langue", type="integer", nullable=true)
     */
    private $langue;

    /**
     * @var int|null
     *
     * @ORM\Column(name="level", type="integer", nullable=true)
     */
    private $level;

    /**
     * @var int|null
     *
     * @ORM\Column(name="categorie", type="integer", nullable=true)
     */
    private $categorie;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sous_categorie", type="integer", nullable=true)
     */
    private $sousCategorie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sous_categorie3", type="text", length=65535, nullable=true)
     */
    private $sousCategorie3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sous_categorie4", type="text", length=65535, nullable=true)
     */
    private $sousCategorie4;

    /**
     * @var string|null
     *
     * @ORM\Column(name="skills", type="text", length=0, nullable=true)
     */
    private $skills;

    /**
     * @var string|null
     *
     * @ORM\Column(name="highlights", type="text", length=0, nullable=true)
     */
    private $highlights;

    /**
     * @var float|null
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=true)
     */
    private $prix;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prix_unite", type="string", length=50, nullable=true)
     */
    private $prixUnite;

    /**
     * @var float|null
     *
     * @ORM\Column(name="pricing", type="float", precision=10, scale=0, nullable=true)
     */
    private $pricing;

    /**
     * @var float|null
     *
     * @ORM\Column(name="discount", type="float", precision=10, scale=0, nullable=true)
     */
    private $discount;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_debut_discount", type="datetime", nullable=true)
     */
    private $dateDebutDiscount;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_fin_discount", type="datetime", nullable=true)
     */
    private $dateFinDiscount;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_niveau", type="integer", nullable=true)
     */
    private $idNiveau;

    /**
     * @var int|null
     *
     * @ORM\Column(name="type_cours", type="integer", nullable=true)
     */
    private $typeCours;

    /**
     * @var int|null
     *
     * @ORM\Column(name="full_time_acce", type="integer", nullable=true)
     */
    private $fullTimeAcce;

    /**
     * @var int|null
     *
     * @ORM\Column(name="published", type="integer", nullable=true)
     */
    private $published;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="published_date_debut", type="datetime", nullable=true)
     */
    private $publishedDateDebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="published_date_fin", type="datetime", nullable=true)
     */
    private $publishedDateFin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="promotion_link", type="string", length=200, nullable=true)
     */
    private $promotionLink;

    /**
     * @var int|null
     *
     * @ORM\Column(name="coupon", type="integer", nullable=true)
     */
    private $coupon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Enrollment", type="string", length=100, nullable=true)
     */
    private $enrollment;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Enrollment_password", type="string", length=100, nullable=true)
     */
    private $enrollmentPassword;

    /**
     * @var string|null
     *
     * @ORM\Column(name="message_felicitation", type="string", length=200, nullable=true)
     */
    private $messageFelicitation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="message_welcom", type="string", length=200, nullable=true)
     */
    private $messageWelcom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_insertion", type="datetime", nullable=true)
     */
    private $dateInsertion;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_last_update", type="datetime", nullable=true)
     */
    private $dateLastUpdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_operation", type="datetime", nullable=false)
     */
    private $dateOperation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="course_status", type="string", length=255, nullable=true)
     */
    private $courseStatus;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="course_expiration_date", type="datetime", nullable=true)
     */
    private $courseExpirationDate;
    
    public function __construct()
   {
       $this->dateOperation = new DateTime(); 
       $this->dateLastUpdate = new DateTime(); 
   }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeCours(): ?string
    {
        return $this->codeCours;
    }

    public function setCodeCours(?string $codeCours): self
    {
        $this->codeCours = $codeCours;

        return $this;
    }

    public function getForum(): ?int
    {
        return $this->forum;
    }

    public function setForum(?int $forum): self
    {
        $this->forum = $forum;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSousTitre(): ?string
    {
        return $this->sousTitre;
    }

    public function setSousTitre(?string $sousTitre): self
    {
        $this->sousTitre = $sousTitre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getWhatToLearn(): ?string
    {
        return $this->whatToLearn;
    }

    public function setWhatToLearn(?string $whatToLearn): self
    {
        $this->whatToLearn = $whatToLearn;

        return $this;
    }

    public function getRequirementPrerequis(): ?string
    {
        return $this->requirementPrerequis;
    }

    public function setRequirementPrerequis(?string $requirementPrerequis): self
    {
        $this->requirementPrerequis = $requirementPrerequis;

        return $this;
    }

    public function getForWhoIsThisCours(): ?string
    {
        return $this->forWhoIsThisCours;
    }

    public function setForWhoIsThisCours(?string $forWhoIsThisCours): self
    {
        $this->forWhoIsThisCours = $forWhoIsThisCours;

        return $this;
    }

    public function getCertification(): ?int
    {
        return $this->certification;
    }

    public function setCertification(?int $certification): self
    {
        $this->certification = $certification;

        return $this;
    }

    public function getImageCours(): ?string
    {
        return $this->imageCours;
    }

    public function setImageCours(?string $imageCours): self
    {
        $this->imageCours = $imageCours;

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

    public function getIdContributor(): ?int
    {
        return $this->idContributor;
    }

    public function setIdContributor(?int $idContributor): self
    {
        $this->idContributor = $idContributor;

        return $this;
    }

    public function getLangue(): ?int
    {
        return $this->langue;
    }

    public function setLangue(?int $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getCategorie(): ?int
    {
        return $this->categorie;
    }

    public function setCategorie(?int $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getSousCategorie(): ?int
    {
        return $this->sousCategorie;
    }

    public function setSousCategorie(?int $sousCategorie): self
    {
        $this->sousCategorie = $sousCategorie;

        return $this;
    }

    public function getSousCategorie3(): ?string
    {
        return $this->sousCategorie3;
    }

    public function setSousCategorie3(?string $sousCategorie3): self
    {
        $this->sousCategorie3 = $sousCategorie3;

        return $this;
    }

    public function getSousCategorie4(): ?string
    {
        return $this->sousCategorie4;
    }

    public function setSousCategorie4(?string $sousCategorie4): self
    {
        $this->sousCategorie4 = $sousCategorie4;

        return $this;
    }

    public function getSkills(): ?string
    {
        return $this->skills;
    }

    public function setSkills(?string $skills): self
    {
        $this->skills = $skills;

        return $this;
    }

    public function getHighlights(): ?string
    {
        return $this->highlights;
    }

    public function setHighlights(?string $highlights): self
    {
        $this->highlights = $highlights;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPrixUnite(): ?string
    {
        return $this->prixUnite;
    }

    public function setPrixUnite(?string $prixUnite): self
    {
        $this->prixUnite = $prixUnite;

        return $this;
    }

    public function getPricing(): ?float
    {
        return $this->pricing;
    }

    public function setPricing(?float $pricing): self
    {
        $this->pricing = $pricing;

        return $this;
    }

    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    public function setDiscount(?float $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getDateDebutDiscount(): ?\DateTimeInterface
    {
        return $this->dateDebutDiscount;
    }

    public function setDateDebutDiscount(?\DateTimeInterface $dateDebutDiscount): self
    {
        $this->dateDebutDiscount = $dateDebutDiscount;

        return $this;
    }

    public function getDateFinDiscount(): ?\DateTimeInterface
    {
        return $this->dateFinDiscount;
    }

    public function setDateFinDiscount(?\DateTimeInterface $dateFinDiscount): self
    {
        $this->dateFinDiscount = $dateFinDiscount;

        return $this;
    }

    public function getIdNiveau(): ?int
    {
        return $this->idNiveau;
    }

    public function setIdNiveau(?int $idNiveau): self
    {
        $this->idNiveau = $idNiveau;

        return $this;
    }

    public function getTypeCours(): ?int
    {
        return $this->typeCours;
    }

    public function setTypeCours(?int $typeCours): self
    {
        $this->typeCours = $typeCours;

        return $this;
    }

    public function getFullTimeAcce(): ?int
    {
        return $this->fullTimeAcce;
    }

    public function setFullTimeAcce(?int $fullTimeAcce): self
    {
        $this->fullTimeAcce = $fullTimeAcce;

        return $this;
    }

    public function getPublished(): ?int
    {
        return $this->published;
    }

    public function setPublished(?int $published): self
    {
        $this->published = $published;

        return $this;
    }

    public function getPublishedDateDebut(): ?\DateTimeInterface
    {
        return $this->publishedDateDebut;
    }

    public function setPublishedDateDebut(?\DateTimeInterface $publishedDateDebut): self
    {
        $this->publishedDateDebut = $publishedDateDebut;

        return $this;
    }

    public function getPublishedDateFin(): ?\DateTimeInterface
    {
        return $this->publishedDateFin;
    }

    public function setPublishedDateFin(?\DateTimeInterface $publishedDateFin): self
    {
        $this->publishedDateFin = $publishedDateFin;

        return $this;
    }

    public function getPromotionLink(): ?string
    {
        return $this->promotionLink;
    }

    public function setPromotionLink(?string $promotionLink): self
    {
        $this->promotionLink = $promotionLink;

        return $this;
    }

    public function getCoupon(): ?int
    {
        return $this->coupon;
    }

    public function setCoupon(?int $coupon): self
    {
        $this->coupon = $coupon;

        return $this;
    }

    public function getEnrollment(): ?string
    {
        return $this->enrollment;
    }

    public function setEnrollment(?string $enrollment): self
    {
        $this->enrollment = $enrollment;

        return $this;
    }

    public function getEnrollmentPassword(): ?string
    {
        return $this->enrollmentPassword;
    }

    public function setEnrollmentPassword(?string $enrollmentPassword): self
    {
        $this->enrollmentPassword = $enrollmentPassword;

        return $this;
    }

    public function getMessageFelicitation(): ?string
    {
        return $this->messageFelicitation;
    }

    public function setMessageFelicitation(?string $messageFelicitation): self
    {
        $this->messageFelicitation = $messageFelicitation;

        return $this;
    }

    public function getMessageWelcom(): ?string
    {
        return $this->messageWelcom;
    }

    public function setMessageWelcom(?string $messageWelcom): self
    {
        $this->messageWelcom = $messageWelcom;

        return $this;
    }

    public function getDateInsertion(): ?\DateTimeInterface
    {
        return $this->dateInsertion;
    }

    public function setDateInsertion(?\DateTimeInterface $dateInsertion): self
    {
        $this->dateInsertion = $dateInsertion;

        return $this;
    }

    public function getDateLastUpdate(): ?\DateTimeInterface
    {
        return $this->dateLastUpdate;
    }

    public function setDateLastUpdate(?\DateTimeInterface $dateLastUpdate): self
    {
        $this->dateLastUpdate = $dateLastUpdate;

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

    public function getCourseStatus(): ?string
    {
        return $this->courseStatus;
    }

    public function setCourseStatus(?string $courseStatus): self
    {
        $this->courseStatus = $courseStatus;

        return $this;
    }

    public function getCourseExpirationDate(): ?\DateTimeInterface
    {
        return $this->courseExpirationDate;
    }

    public function setCourseExpirationDate(?\DateTimeInterface $courseExpirationDate): self
    {
        $this->courseExpirationDate = $courseExpirationDate;

        return $this;
    }


}
