<?php

namespace App\Entity;

use App\Repository\CategorieBoardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieBoardRepository::class)
 */
class CategorieBoard
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $lien_icon;

    /**
     * @ORM\OneToMany(targetEntity=Board::class, mappedBy="categorie", orphanRemoval=true)
     */
    private $boards;

    public function __construct()
    {
        $this->boards = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getLienIcon(): ?string
    {
        return $this->lien_icon;
    }

    public function setLienIcon(?string $lien_icon): self
    {
        $this->lien_icon = $lien_icon;

        return $this;
    }

    /**
     * @return Collection|Board[]
     */
    public function getBoards(): Collection
    {
        return $this->boards;
    }

    public function addBoard(Board $board): self
    {
        if (!$this->boards->contains($board)) {
            $this->boards[] = $board;
            $board->setCategorie($this);
        }

        return $this;
    }

    public function removeBoard(Board $board): self
    {
        if ($this->boards->removeElement($board)) {
            // set the owning side to null (unless already changed)
            if ($board->getCategorie() === $this) {
                $board->setCategorie(null);
            }
        }

        return $this;
    }
}
