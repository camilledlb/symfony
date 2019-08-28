<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CircuitRepository")
 */
class Circuit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $circuit_caption;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Race", mappedBy="race_circuit")
     */
    private $listCircuit;

    public function __construct()
    {
        $this->listCircuit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCircuitCaption(): ?string
    {
        return $this->circuit_caption;
    }

    public function setCircuitCaption(string $circuit_caption): self
    {
        $this->circuit_caption = $circuit_caption;

        return $this;
    }

    /**
     * @return Collection|Race[]
     */
    public function getListCircuit(): Collection
    {
        return $this->listCircuit;
    }

    public function addListCircuit(Race $listCircuit): self
    {
        if (!$this->listCircuit->contains($listCircuit)) {
            $this->listCircuit[] = $listCircuit;
            $listCircuit->setRaceCircuit($this);
        }

        return $this;
    }

    public function removeListCircuit(Race $listCircuit): self
    {
        if ($this->listCircuit->contains($listCircuit)) {
            $this->listCircuit->removeElement($listCircuit);
            // set the owning side to null (unless already changed)
            if ($listCircuit->getRaceCircuit() === $this) {
                $listCircuit->setRaceCircuit(null);
            }
        }

        return $this;
    }
}
