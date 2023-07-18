<?php

namespace App\Entity;

use App\Repository\GeoLocationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeoLocationRepository::class)]
class GeoLocation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?float $longitude = null;

    #[ORM\Column(nullable: true)]
    private ?float $latitude = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $altitude = null;

    #[ORM\Column(nullable: true)]
    private ?int $accuracy = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(?float $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getAltitude(): ?string
    {
        return $this->altitude;
    }

    public function setAltitude(?string $altitude): static
    {
        $this->altitude = $altitude;

        return $this;
    }

    public function getAccuracy(): ?int
    {
        return $this->accuracy;
    }

    public function setAccuracy(?int $accuracy): static
    {
        $this->accuracy = $accuracy;

        return $this;
    }
}
