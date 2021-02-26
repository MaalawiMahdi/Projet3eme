<?php

namespace App\Entity;

use App\Repository\SujetRepository;
<<<<<<< HEAD
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
=======
>>>>>>> e906642b4420c02199eb6300b6d0ed4d4fdf7afa
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SujetRepository::class)
 */
class Sujet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
<<<<<<< HEAD
     * @ORM\Column(type="string", length=20)
=======
     * @ORM\Column(type="string", length=255, nullable=true)
>>>>>>> e906642b4420c02199eb6300b6d0ed4d4fdf7afa
     */
    private $titre;

    /**
<<<<<<< HEAD
     * @ORM\Column(type="string", length=500, nullable=true)
=======
     * @ORM\Column(type="string", length=255, nullable=true)
>>>>>>> e906642b4420c02199eb6300b6d0ed4d4fdf7afa
     */
    private $description;

    /**
<<<<<<< HEAD
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $lien_image;

    /**
     * @ORM\ManyToOne(targetEntity=Board::class, inversedBy="sujets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $board;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="sujet", orphanRemoval=true)
     */
    private $commentaires;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    }
=======
     * @ORM\Column(type="integer")
     */
    private $IDD;
>>>>>>> e906642b4420c02199eb6300b6d0ed4d4fdf7afa

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

<<<<<<< HEAD
    public function setTitre(string $titre): self
=======
    public function setTitre(?string $titre): self
>>>>>>> e906642b4420c02199eb6300b6d0ed4d4fdf7afa
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

<<<<<<< HEAD
    public function getLienImage(): ?string
    {
        return $this->lien_image;
    }

    public function setLienImage(?string $lien_image): self
    {
        $this->lien_image = $lien_image;

        return $this;
    }

    public function getBoard(): ?Board
    {
        return $this->board;
    }

    public function setBoard(?Board $board): self
    {
        $this->board = $board;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setSujet($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getSujet() === $this) {
                $commentaire->setSujet(null);
            }
        }
=======
    public function getIDD(): ?int
    {
        return $this->IDD;
    }

    public function setIDD(int $IDD): self
    {
        $this->IDD = $IDD;
>>>>>>> e906642b4420c02199eb6300b6d0ed4d4fdf7afa

        return $this;
    }
}
