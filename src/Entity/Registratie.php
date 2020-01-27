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
}
