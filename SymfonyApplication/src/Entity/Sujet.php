<?php

namespace App\Entity;

use App\Repository\SujetRepository;
<<<<<<< HEAD

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

=======
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
>>>>>>> 130d40d691abddc5e6951d1e9be714fd9f40c71f
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=SujetRepository::class)
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
     * @ORM\Column(type="string", length=20)
<<<<<<< HEAD
     * @ORM\Column(type="string", length=255, nullable=true)
=======
>>>>>>> 130d40d691abddc5e6951d1e9be714fd9f40c71f
     */
    private $titre;

    /**
<<<<<<< HEAD
     * @ORM\Column(type="string", length=500, nullable=true)
=======
>>>>>>> 130d40d691abddc5e6951d1e9be714fd9f40c71f
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $lien_image;

    /**
     * @ORM\ManyToOne(targetEntity=Board::class, inversedBy="Sujet")
     * @ORM\JoinColumn(nullable=false)
     */
    private $board;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="Sujet", orphanRemoval=true)
     */
    private $commentaires;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    }
<<<<<<< HEAD
    /**
     * @ORM\Column(type="integer")
     */
    private $IDD;
=======
>>>>>>> 130d40d691abddc5e6951d1e9be714fd9f40c71f

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

<<<<<<< HEAD

    public function setTitre(?string $titre): self
=======
    public function setTitre(string $titre): self
>>>>>>> 130d40d691abddc5e6951d1e9be714fd9f40c71f
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

=======
>>>>>>> 130d40d691abddc5e6951d1e9be714fd9f40c71f
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
        if ($this->commentaires->removeElement($commentaire))
        {
            // set the owning side to null (unless already changed)
            if ($commentaire->getSujet() === $this) {
                $commentaire->setSujet(null);
            }
        }
<<<<<<< HEAD
    }
    public function getIDD(): ?int
    {
        return $this->IDD;
    }

    public function setIDD(int $IDD): self
    {
        $this->IDD = $IDD;

        return $this;
=======
>>>>>>> 130d40d691abddc5e6951d1e9be714fd9f40c71f
    }
}
