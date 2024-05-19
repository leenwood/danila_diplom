<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $VIN = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $stateNumber = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $payload = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $remainingFuel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVIN(): ?string
    {
        return $this->VIN;
    }

    public function setVIN(string $VIN): static
    {
        $this->VIN = $VIN;

        return $this;
    }

    public function getStateNumber(): ?string
    {
        return $this->stateNumber;
    }

    public function setStateNumber(?string $stateNumber): static
    {
        $this->stateNumber = $stateNumber;

        return $this;
    }

    public function getPayload(): ?string
    {
        return $this->payload;
    }

    public function setPayload(?string $payload): static
    {
        $this->payload = $payload;

        return $this;
    }

    public function getRemainingFuel(): ?string
    {
        return $this->remainingFuel;
    }

    public function setRemainingFuel(?string $remainingFuel): static
    {
        $this->remainingFuel = $remainingFuel;

        return $this;
    }
}
