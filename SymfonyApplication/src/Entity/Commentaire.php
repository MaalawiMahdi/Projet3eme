<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $com;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="commentaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity=sujet::class, inversedBy="commentaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sujet;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCom(): ?string
    {
        return $this->com;
    }

    public function setCom(string $com): self
    {
        $this->com = $com;

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

    public function getSujet(): ?sujet
    {
        return $this->sujet;
    }

    public function setSujet(?sujet $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }
}
