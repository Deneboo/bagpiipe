<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 * @Vich\Uploadable()
 */
class Event
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
     * @ORM\Column(type="string", length=55)
     */
    private $event_title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $event_subtitle;

    /**
     * @ORM\Column(type="text")
     */
    private $event_description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $event_date_start;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $event_date_end;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $event_story;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Adress", inversedBy="events")
     */
    private $adresses;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    public function __construct()
    {
        $this->adresses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventTitle(): ?string
    {
        return $this->event_title;
    }

    public function setEventTitle(string $event_title): self
    {
        $this->event_title = $event_title;

        return $this;
    }

    public function getEventSubtitle(): ?string
    {
        return $this->event_subtitle;
    }

    public function setEventSubtitle(?string $event_subtitle): self
    {
        $this->event_subtitle = $event_subtitle;

        return $this;
    }

    public function getEventDescription(): ?string
    {
        return $this->event_description;
    }

    public function setEventDescription(string $event_description): self
    {
        $this->event_description = $event_description;

        return $this;
    }

    public function getEventDateStart(): ?\DateTimeInterface
    {
        return $this->event_date_start;
    }

    public function setEventDateStart(\DateTimeInterface $event_date_start): self
    {
        $this->event_date_start = $event_date_start;

        return $this;
    }

    public function getEventDateEnd(): ?\DateTimeInterface
    {
        return $this->event_date_end;
    }

    public function setEventDateEnd(?\DateTimeInterface $event_date_end): self
    {
        $this->event_date_end = $event_date_end;

        return $this;
    }

    public function getEventStory(): ?string
    {
        return $this->event_story;
    }

    public function setEventStory(?string $event_story): self
    {
        $this->event_story = $event_story;

        return $this;
    }

    /**
     * @return Collection|Adress[]
     */
    public function getAdresses(): Collection
    {
        return $this->adresses;
    }

    public function addAdress(Adress $adress): self
    {
        if (!$this->adresses->contains($adress)) {
            $this->adresses[] = $adress;
        }

        return $this;
    }

    public function removeAdress(Adress $adress): self
    {
        if ($this->adresses->contains($adress)) {
            $this->adresses->removeElement($adress);
        }

        return $this;
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
     * @return Event
     */
    public function setFilename(?string $filename): Event
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
     * @return Event
     * @throws Exception
     */
    public function setImageFile(?File $imageFile): Event
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
}
