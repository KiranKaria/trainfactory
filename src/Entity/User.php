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
    private $login_naam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $wachtwoord;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $voornaam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pre_provision;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $achternaam;

    /**
     * @ORM\Column(type="date")
     */
    private $geboorte_datum;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $geslacht;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_adres;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $rol;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $huur_datum;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=0, nullable=true)
     */
    private $salaris;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $straat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $postcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $plaats;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\registratie", mappedBy="user")
     */
    private $registratie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\les", mappedBy="user")
     */
    private $les;

    public function __construct()
    {
        $this->registratie = new ArrayCollection();
        $this->les = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLoginNaam(): ?string
    {
        return $this->login_naam;
    }

    public function setLoginNaam(string $login_naam): self
    {
        $this->login_naam = $login_naam;

        return $this;
    }

    public function getWachtwoord(): ?string
    {
        return $this->wachtwoord;
    }

    public function setWachtwoord(string $wachtwoord): self
    {
        $this->wachtwoord = $wachtwoord;

        return $this;
    }

    public function getVoornaam(): ?string
    {
        return $this->voornaam;
    }

    public function setVoornaam(string $voornaam): self
    {
        $this->voornaam = $voornaam;

        return $this;
    }

    public function getPreProvision(): ?string
    {
        return $this->pre_provision;
    }

    public function setPreProvision(string $pre_provision): self
    {
        $this->pre_provision = $pre_provision;

        return $this;
    }

    public function getAchternaam(): ?string
    {
        return $this->achternaam;
    }

    public function setAchternaam(string $achternaam): self
    {
        $this->achternaam = $achternaam;

        return $this;
    }

    public function getGeboorteDatum(): ?\DateTimeInterface
    {
        return $this->geboorte_datum;
    }

    public function setGeboorteDatum(\DateTimeInterface $geboorte_datum): self
    {
        $this->geboorte_datum = $geboorte_datum;

        return $this;
    }

    public function getGeslacht(): ?string
    {
        return $this->geslacht;
    }

    public function setGeslacht(string $geslacht): self
    {
        $this->geslacht = $geslacht;

        return $this;
    }

    public function getEmailAdres(): ?string
    {
        return $this->email_adres;
    }

    public function setEmailAdres(string $email_adres): self
    {
        $this->email_adres = $email_adres;

        return $this;
    }

    public function getRol(): ?string
    {
        return $this->rol;
    }

    public function setRol(?string $rol): self
    {
        $this->rol = $rol;

        return $this;
    }

    public function getHuurDatum(): ?\DateTimeInterface
    {
        return $this->huur_datum;
    }

    public function setHuurDatum(?\DateTimeInterface $huur_datum): self
    {
        $this->huur_datum = $huur_datum;

        return $this;
    }

    public function getSalaris(): ?string
    {
        return $this->salaris;
    }

    public function setSalaris(?string $salaris): self
    {
        $this->salaris = $salaris;

        return $this;
    }

    public function getStraat(): ?string
    {
        return $this->straat;
    }

    public function setStraat(?string $straat): self
    {
        $this->straat = $straat;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(?string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getPlaats(): ?string
    {
        return $this->plaats;
    }

    public function setPlaats(?string $plaats): self
    {
        $this->plaats = $plaats;

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
            $registratie->setUser($this);
        }

        return $this;
    }

    public function removeRegistratie(registratie $registratie): self
    {
        if ($this->registratie->contains($registratie)) {
            $this->registratie->removeElement($registratie);
            // set the owning side to null (unless already changed)
            if ($registratie->getUser() === $this) {
                $registratie->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|les[]
     */
    public function getLes(): Collection
    {
        return $this->les;
    }

    public function addLe(les $le): self
    {
        if (!$this->les->contains($le)) {
            $this->les[] = $le;
            $le->setUser($this);
        }

        return $this;
    }

    public function removeLe(les $le): self
    {
        if ($this->les->contains($le)) {
            $this->les->removeElement($le);
            // set the owning side to null (unless already changed)
            if ($le->getUser() === $this) {
                $le->setUser(null);
            }
        }

        return $this;
    }
}
