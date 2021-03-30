<?php

namespace App\Entity;

use App\Repository\ProduitServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProduitServiceRepository::class)
 */
class ProduitService
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
    private $description;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Assert\File(mimeTypes={ "image/jpeg" , "image/png",  "image/jpg" })
     *  @Assert\NotBlank(message="please upload image")



     */
    private $lien_image;

    /**
     * @ORM\Column(type="string", length=20)


     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Board::class, inversedBy="produitServices")
     * @ORM\JoinColumn(nullable=false)
     */
    private $board;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieProduitService::class, inversedBy="produitServices")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_unitaire;

    /**
     * @ORM\OneToMany(targetEntity=ProdutiCommande::class, mappedBy="produitservice")
     */
    private $produtiCommandes;

    public function __construct()
    {
        $this->produtiCommandes = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLienImage()
    {
        return $this->lien_image;
    }

    public function setLienImage($lien_image)
    {
        $this->lien_image = $lien_image;

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

    public function getBoard(): ?Board
    {
        return $this->board;
    }

    public function setBoard(?Board $board): self
    {
        $this->board = $board;

        return $this;
    }

    public function getCategorie(): ?CategorieProduitService
    {
        return $this->categorie;
    }

    public function setCategorie(?CategorieProduitService $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getPrixUnitaire(): ?float
    {
        return $this->prix_unitaire;
    }

    public function setPrixUnitaire(float $prix_unitaire): self
    {
        $this->prix_unitaire = $prix_unitaire;

        return $this;
    }

    public function __toString():string
    {
        return $this->getId();
    }

    /**
     * @return Collection|ProdutiCommande[]
     */
    public function getProdutiCommandes(): Collection
    {
        return $this->produtiCommandes;
    }

    public function addProdutiCommande(ProdutiCommande $produtiCommande): self
    {
        if (!$this->produtiCommandes->contains($produtiCommande)) {
            $this->produtiCommandes[] = $produtiCommande;
            $produtiCommande->setProduitservice($this);
        }

        return $this;
    }

    public function removeProdutiCommande(ProdutiCommande $produtiCommande): self
    {
        if ($this->produtiCommandes->removeElement($produtiCommande)) {
            // set the owning side to null (unless already changed)
            if ($produtiCommande->getProduitservice() === $this) {
                $produtiCommande->setProduitservice(null);
            }
        }

        return $this;
    }

}
