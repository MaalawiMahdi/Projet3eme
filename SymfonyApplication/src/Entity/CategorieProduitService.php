<?php

namespace App\Entity;

use App\Repository\CategorieProduitServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieProduitServiceRepository::class)
 */
class CategorieProduitService
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
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=ProduitService::class, mappedBy="categorie", orphanRemoval=true)
     */
    private $produitServices;

    /**
     * @ORM\ManyToOne(targetEntity=Board::class, inversedBy="categorieProduitServices")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Board;

    public function __construct()
    {
        $this->produitServices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|ProduitService[]
     */
    public function getProduitServices(): Collection
    {
        return $this->produitServices;
    }

    public function addProduitService(ProduitService $produitService): self
    {
        if (!$this->produitServices->contains($produitService)) {
            $this->produitServices[] = $produitService;
            $produitService->setCategorie($this);
        }

        return $this;
    }

    public function removeProduitService(ProduitService $produitService): self
    {
        if ($this->produitServices->removeElement($produitService)) {
            // set the owning side to null (unless already changed)
            if ($produitService->getCategorie() === $this) {
                $produitService->setCategorie(null);
            }
        }

        return $this;
    }

    public function getBoard(): ?Board
    {
        return $this->Board;
    }

    public function setBoard(?Board $Board): self
    {
        $this->Board = $Board;

        return $this;
    }
}
