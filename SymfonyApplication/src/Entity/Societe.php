<?php

namespace App\Entity;

use App\Repository\SocieteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SocieteRepository::class)
 */
class Societe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $numregistre;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $type;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etat;

    /**
     * @ORM\OneToOne(targetEntity=user::class, inversedBy="societe", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $useraccount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumregistre(): ?string
    {
        return $this->numregistre;
    }

    public function setNumregistre(string $numregistre): self
    {
        $this->numregistre = $numregistre;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getUseraccount(): ?user
    {
        return $this->useraccount;
    }

    public function setUseraccount(user $useraccount): self
    {
        $this->useraccount = $useraccount;

        return $this;
    }
}
