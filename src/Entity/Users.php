<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users
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
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="roles", type="text", length=0, nullable=true)
     */
    private $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=false)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=5, nullable=false)
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=150, nullable=false)
     */
    private $city;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_verified", type="boolean", nullable=false)
     */
    private $isVerified;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reset_token", type="string", length=255, nullable=true)
     */
    private $resetToken;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var int|null
     *
     * @ORM\Column(name="contributeur", type="integer", nullable=true)
     */
    private $contributeur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code_user", type="string", length=255, nullable=true)
     */
    private $codeUser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="linkedin", type="string", length=255, nullable=true)
     */
    private $linkedin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @var string|null
     *
     * @ORM\Column(name="siteweb", type="string", length=255, nullable=true)
     */
    private $siteweb;

    /**
     * @var string|null
     *
     * @ORM\Column(name="langue", type="string", length=255, nullable=true)
     */
    private $langue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gmail_compte", type="string", length=255, nullable=true)
     */
    private $gmailCompte;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cv", type="string", length=255, nullable=true)
     */
    private $cv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="psoeudo", type="string", length=255, nullable=true)
     */
    private $psoeudo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="video_descriptive", type="string", length=255, nullable=true)
     */
    private $videoDescriptive;

    /**
     * @var string|null
     *
     * @ORM\Column(name="langue_niveau", type="string", length=255, nullable=true)
     */
    private $langueNiveau;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imageVideo", type="string", length=255, nullable=true)
     */
    private $imagevideo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_country", type="integer", nullable=true)
     */
    private $idCountry;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_time_zone", type="integer", nullable=true)
     */
    private $idTimeZone;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Forum", type="integer", nullable=true)
     */
    private $forum;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(?string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function isIsVerified(): ?bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getResetToken(): ?string
    {
        return $this->resetToken;
    }

    public function setResetToken(?string $resetToken): self
    {
        $this->resetToken = $resetToken;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getContributeur(): ?int
    {
        return $this->contributeur;
    }

    public function setContributeur(?int $contributeur): self
    {
        $this->contributeur = $contributeur;

        return $this;
    }

    public function getCodeUser(): ?string
    {
        return $this->codeUser;
    }

    public function setCodeUser(?string $codeUser): self
    {
        $this->codeUser = $codeUser;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getSiteweb(): ?string
    {
        return $this->siteweb;
    }

    public function setSiteweb(?string $siteweb): self
    {
        $this->siteweb = $siteweb;

        return $this;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(?string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getGmailCompte(): ?string
    {
        return $this->gmailCompte;
    }

    public function setGmailCompte(?string $gmailCompte): self
    {
        $this->gmailCompte = $gmailCompte;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(?string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getPsoeudo(): ?string
    {
        return $this->psoeudo;
    }

    public function setPsoeudo(?string $psoeudo): self
    {
        $this->psoeudo = $psoeudo;

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

    public function getLangueNiveau(): ?string
    {
        return $this->langueNiveau;
    }

    public function setLangueNiveau(?string $langueNiveau): self
    {
        $this->langueNiveau = $langueNiveau;

        return $this;
    }

    public function getImagevideo(): ?string
    {
        return $this->imagevideo;
    }

    public function setImagevideo(?string $imagevideo): self
    {
        $this->imagevideo = $imagevideo;

        return $this;
    }

    public function getIdCountry(): ?int
    {
        return $this->idCountry;
    }

    public function setIdCountry(?int $idCountry): self
    {
        $this->idCountry = $idCountry;

        return $this;
    }

    public function getIdTimeZone(): ?int
    {
        return $this->idTimeZone;
    }

    public function setIdTimeZone(?int $idTimeZone): self
    {
        $this->idTimeZone = $idTimeZone;

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


}
