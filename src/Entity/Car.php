<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 */
class Car
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $car_caption;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $car_photo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Race", mappedBy="race_car")
     */
    private $listRaces;

    public function __construct()
    {
        $this->listRaces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarCaption(): ?string
    {
        return $this->car_caption;
    }

    public function setCarCaption(string $car_caption): self
    {
        $this->car_caption = $car_caption;

        return $this;
    }

    public function getCarPhoto(): ?string
    {
        return $this->car_photo;
    }

    public function setCarPhoto(string $car_photo): self
    {
        $this->car_photo = $car_photo;

        return $this;
    }

    /**
     * @return Collection|Race[]
     */
    public function getListRaces(): Collection
    {
        return $this->listRaces;
    }

    public function addListRace(Race $listRace): self
    {
        if (!$this->listRaces->contains($listRace)) {
            $this->listRaces[] = $listRace;
            $listRace->setRaceCar($this);
        }

        return $this;
    }

    public function removeListRace(Race $listRace): self
    {
        if ($this->listRaces->contains($listRace)) {
            $this->listRaces->removeElement($listRace);
            // set the owning side to null (unless already changed)
            if ($listRace->getRaceCar() === $this) {
                $listRace->setRaceCar(null);
            }
        }

        return $this;
    }
}
