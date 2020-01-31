<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LesRepository")
 */
class Les
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $tijd;

    /**
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $locatie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Training", inversedBy="lesson")
     * @ORM\JoinColumn(nullable=false)
     */
    private $training;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Registratie", mappedBy="les")
     */
    private $registratie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="les")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    public function __construct()
    {
        $this->registratie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTijd(): ?\DateTimeInterface
    {
        return $this->tijd;
    }

    public function setTijd(\DateTimeInterface $tijd): self
    {
        $this->tijd = $tijd;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getLocatie(): ?string
    {
        return $this->locatie;
    }

    public function setLocatie(string $locatie): self
    {
        $this->locatie = $locatie;

        return $this;
    }

    public function getTraining(): ?Training
    {
        return $this->training;
    }

    public function setTraining(?Training $training): self
    {
        $this->training = $training;

        return $this;
    }

    /**
     * @return Collection|registratie[]
     */
    public function getRegistratie(): Collection
    {
        return $this->registratie;
    }

    public function addRegistratie(registratie $registratie): self
    {
        if (!$this->registratie->contains($registratie)) {
            $this->registratie[] = $registratie;
            $registratie->setLes($this);
        }

        return $this;
    }

    public function removeRegistratie(registratie $registratie): self
    {
        if ($this->registratie->contains($registratie)) {
            $this->registratie->removeElement($registratie);
            // set the owning side to null (unless already changed)
            if ($registratie->getLes() === $this) {
                $registratie->setLes(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }
}
