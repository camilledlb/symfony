<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
    private $user_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Race", mappedBy="race_user")
     */
    private $race_car;

    public function __construct()
    {
        $this->race_car = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->user_name;
    }

    public function setUserName(string $user_name): self
    {
        $this->user_name = $user_name;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->user_email;
    }

    public function setUserEmail(string $user_email): self
    {
        $this->user_email = $user_email;

        return $this;
    }

    /**
     * @return Collection|Race[]
     */
    public function getRaceCar(): Collection
    {
        return $this->race_car;
    }

    public function addRaceCar(Race $raceCar): self
    {
        if (!$this->race_car->contains($raceCar)) {
            $this->race_car[] = $raceCar;
            $raceCar->setRaceUser($this);
        }

        return $this;
    }

    public function removeRaceCar(Race $raceCar): self
    {
        if ($this->race_car->contains($raceCar)) {
            $this->race_car->removeElement($raceCar);
            // set the owning side to null (unless already changed)
            if ($raceCar->getRaceUser() === $this) {
                $raceCar->setRaceUser(null);
            }
        }

        return $this;
    }
}
