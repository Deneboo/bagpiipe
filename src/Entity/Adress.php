<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=16, nullable=true)
     */
    private $adress_street_number;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private $adress_street_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adress_information;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdressStreetNumber(): ?string
    {
        return $this->adress_street_number;
    }

    public function setAdressStreetNumber(?string $adress_street_number): self
    {
        $this->adress_street_number = $adress_street_number;

        return $this;
    }

    public function getAdressStreetName(): ?string
    {
        return $this->adress_street_name;
    }

    public function setAdressStreetName(string $adress_street_name): self
    {
        $this->adress_street_name = $adress_street_name;

        return $this;
    }

    public function getAdressInformation(): ?string
    {
        return $this->adress_information;
    }

    public function setAdressInformation(string $adress_information): self
    {
        $this->adress_information = $adress_information;

        return $this;
    }
}
