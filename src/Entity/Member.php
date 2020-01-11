<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MemberRepository")
 * @Vich\Uploadable()
 */
class Member
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @var string|null
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="event_image", fileNameProperty="filename")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private $member_name;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private $member_surname;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $member_birth_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $member_membership_date;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $member_information;

    /**
     * @ORM\Column(type="string", length=16, nullable=true)
     */
    private $member_phone;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     */
    private $member_story;

    /**
     * @ORM\Column(type="string", length=16, nullable=true)
     */
    private $member_statut;

    public function getMemberStatut(): ?string
    {
        return $this->member_statut;
    }

    public function setMemberStatut(string $member_statut): self
    {
        $this->member_statut = $member_statut;
        return $this;
    }

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", mappedBy="member")
     */
    private $user;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return Member
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param string|null $filename
     * @return Member
     */
    public function setFilename(?string $filename): Member
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File|null $imageFile
     * @return Member
     * @throws Exception
     */
    public function setImageFile(?File $imageFile): Member
    {
        $this->imageFile = $imageFile;
        if ($this->imageFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getMemberName(): ?string
    {
        return $this->member_name;
    }

    public function setMemberName(string $member_name): self
    {
        $this->member_name = $member_name;

        return $this;
    }

    public function getMemberSurname(): ?string
    {
        return $this->member_surname;
    }

    public function setMemberSurname(string $member_surname): self
    {
        $this->member_surname = $member_surname;

        return $this;
    }

    public function getMemberBirthDate(): ?\DateTimeInterface
    {
        return $this->member_birth_date;
    }

    public function setMemberBirthDate(?\DateTimeInterface $member_birth_date): self
    {
        $this->member_birth_date = $member_birth_date;

        return $this;
    }

    public function getMemberMembershipDate(): ?\DateTimeInterface
    {
        return $this->member_membership_date;
    }

    public function setMemberMembershipDate(?\DateTimeInterface $member_membership_date): self
    {
        $this->member_membership_date = $member_membership_date;

        return $this;
    }

    public function getMemberInformation(): ?string
    {
        return $this->member_information;
    }

    public function setMemberInformation(?string $member_information): self
    {
        $this->member_information = $member_information;

        return $this;
    }

    public function getMemberPhone(): ?string
    {
        return $this->member_phone;
    }

    public function setMemberPhone(?string $member_phone): self
    {
        $this->member_phone = $member_phone;

        return $this;
    }

    public function getMemberStory(): ?string
    {
        return $this->member_story;
    }

    public function setMemberStory(?string $member_story): self
    {
        $this->member_story = $member_story;

        return $this;
    }
}
