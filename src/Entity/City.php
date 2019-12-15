<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
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
    private $city_name;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $city_postcode;

    /**
     * @ORM\Column(type="string", length=55, nullable=true)
     */
    private $city_country;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCityName(): ?string
    {
        return $this->city_name;
    }

    public function setCityName(string $city_name): self
    {
        $this->city_name = $city_name;

        return $this;
    }

    public function getCityPostcode(): ?string
    {
        return $this->city_postcode;
    }

    public function setCityPostcode(?string $city_postcode): self
    {
        $this->city_postcode = $city_postcode;

        return $this;
    }

    public function getCityCountry(): ?string
    {
        return $this->city_country;
    }

    public function setCityCountry(?string $city_country): self
    {
        $this->city_country = $city_country;

        return $this;
    }
}
