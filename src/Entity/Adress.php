<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdressRepository")
 */
class Adress
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private $adress_title;

    /**
     * @ORM\Column(type="string", length=16, nullable=true)
     */
    private $adress_street_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress_street_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adress_information;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City", cascade={"persist"})
     */
    private $city;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Event", mappedBy="adresses")
     */
    private $events;

    public function __construct()
    {
        $this->events = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdressTitle(): ?string
    {
        return $this->adress_title;
    }


    /**
     * @param $adress_title
     * @return $this
     */
    public function setAdressTitle(?string $adress_title): self
    {
        $this->adress_title = $adress_title;

        return $this;
    }

    public function getAdressStreetNumber(): ?string
    {
        return $this->adress_street_number;
    }

    /**
     * @param string|null $adress_street_number
     * @return $this
     */
    public function setAdressStreetNumber(?string $adress_street_number): self
    {
        $this->adress_street_number = $adress_street_number;

        return $this;
    }

    public function getAdressStreetName(): ?string
    {
        return $this->adress_street_name;
    }

    /**
     * @param string $adress_street_name
     * @return $this
     */
    public function setAdressStreetName(string $adress_street_name): self
    {
        $this->adress_street_name = $adress_street_name;

        return $this;
    }

    public function getAdressInformation(): ?string
    {
        return $this->adress_information;
    }

    public function setAdressInformation(?string $adress_information): self
    {
        $this->adress_information = $adress_information;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return Collection|Event[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->addAdress($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->contains($event)) {
            $this->events->removeElement($event);
            $event->removeAdress($this);
        }

        return $this;
    }
}
