<?php

namespace App\Entity;

use App\Repository\LdRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LdRepository::class)
 */
class Ld
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity=Commentaire::class, inversedBy="lds")
     */
    private $Commentaire;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="lds")
     */
    private $User;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getCommentaire(): ?Commentaire
    {
        return $this->Commentaire;
    }

    public function setCommentaire(?Commentaire $Commentaire): self
    {
        $this->Commentaire = $Commentaire;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
