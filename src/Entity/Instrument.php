<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InstrumentRepository")
 */
class Instrument
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $instrument_name;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $instrument_brand;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $instrument_owner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInstrumentName(): ?string
    {
        return $this->instrument_name;
    }

    public function setInstrumentName(string $instrument_name): self
    {
        $this->instrument_name = $instrument_name;

        return $this;
    }

    public function getInstrumentBrand(): ?string
    {
        return $this->instrument_brand;
    }

    public function setInstrumentBrand(?string $instrument_brand): self
    {
        $this->instrument_brand = $instrument_brand;

        return $this;
    }

    public function getInstrumentOwner(): ?string
    {
        return $this->instrument_owner;
    }

    public function setInstrumentOwner(string $instrument_owner): self
    {
        $this->instrument_owner = $instrument_owner;

        return $this;
    }
}
