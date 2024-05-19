<?php

namespace App\Entity;

use App\Repository\DealRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DealRepository::class)]
class Deal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'deals')]
    private ?Client $client = null;

    #[ORM\ManyToOne(inversedBy: 'deals')]
    private ?User $userInfo = null;

    /**
     * @var Collection<int, CargoRow>
     */
    #[ORM\ManyToMany(targetEntity: CargoRow::class)]
    private Collection $cargoRow;

    public function __construct()
    {
        $this->cargoRow = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getUserInfo(): ?User
    {
        return $this->userInfo;
    }

    public function setUserInfo(?User $userInfo): static
    {
        $this->userInfo = $userInfo;

        return $this;
    }

    /**
     * @return Collection<int, CargoRow>
     */
    public function getCargoRow(): Collection
    {
        return $this->cargoRow;
    }

    public function addCargoRow(CargoRow $cargoRow): static
    {
        if (!$this->cargoRow->contains($cargoRow)) {
            $this->cargoRow->add($cargoRow);
        }

        return $this;
    }

    public function removeCargoRow(CargoRow $cargoRow): static
    {
        $this->cargoRow->removeElement($cargoRow);

        return $this;
    }
}
