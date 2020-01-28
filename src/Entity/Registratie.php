<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RegistratieRepository")
 */
class Registratie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $betaling;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Les", inversedBy="registratie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $les;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="registratie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBetaling(): ?string
    {
        return $this->betaling;
    }

    public function setBetaling(?string $betaling): self
    {
        $this->betaling = $betaling;

        return $this;
    }

    public function getLes(): ?Les
    {
        return $this->les;
    }

    public function setLes(?Les $les): self
    {
        $this->les = $les;

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
}
