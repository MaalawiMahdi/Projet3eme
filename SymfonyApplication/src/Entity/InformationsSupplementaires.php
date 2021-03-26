<?php

namespace App\Entity;

use App\Repository\InformationsSupplementairesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InformationsSupplementairesRepository::class)
 */
class InformationsSupplementaires
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $tell;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="informationsSupplementaires", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTell(): ?string
    {
        return $this->tell;
    }

    public function setTell(?string $tell): self
    {
        $this->tell = $tell;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
