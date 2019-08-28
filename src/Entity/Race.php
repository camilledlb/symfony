<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RaceRepository")
 */
class Race
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="race_car")
     * @ORM\JoinColumn(nullable=false)
     */
    private $race_user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Car", inversedBy="listRaces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $race_car;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Circuit", inversedBy="listCircuit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $race_circuit;

    /**
     * @ORM\Column(type="datetime")
     */
    private $race_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaceUser(): ?User
    {
        return $this->race_user;
    }

    public function setRaceUser(?User $race_user): self
    {
        $this->race_user = $race_user;

        return $this;
    }

    public function getRaceCar(): ?Car
    {
        return $this->race_car;
    }

    public function setRaceCar(?Car $race_car): self
    {
        $this->race_car = $race_car;

        return $this;
    }

    public function getRaceCircuit(): ?Circuit
    {
        return $this->race_circuit;
    }

    public function setRaceCircuit(?Circuit $race_circuit): self
    {
        $this->race_circuit = $race_circuit;

        return $this;
    }

    public function getRaceDate(): ?\DateTimeInterface
    {
        return $this->race_date;
    }

    public function setRaceDate(\DateTimeInterface $race_date): self
    {
        $this->race_date = $race_date;

        return $this;
    }
}
