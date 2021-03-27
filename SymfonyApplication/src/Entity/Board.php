<?php

namespace App\Entity;

use App\Repository\BoardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=BoardRepository::class)
 */
class Board
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\Length(
     *      min = 4,
     *      max = 16,
     *      minMessage = "Your password must be at least {{ limit }} characters long",
     *      maxMessage = "Your passowrd cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     * )
     * @ORM\Column(type="string", length=20)
     */
    private $titre;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieBoard::class, inversedBy="boards")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity=Sujet::class, mappedBy="board", orphanRemoval=true)
     */
    private $sujets;

    /**
     * @ORM\OneToMany(targetEntity=ProduitService::class, mappedBy="board", orphanRemoval=true)
     */
    private $produitServices;

    /**
     * @ORM\OneToMany(targetEntity=Moderator::class, mappedBy="board", orphanRemoval=true)
     */
    private $moderators;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $pic;

    /**
     * @ORM\OneToOne(targetEntity=Societe::class, inversedBy="board", cascade={"persist", "remove"})
     */
    private $Societe;
    /**
     * @ORM\OneToMany(targetEntity=Favoris::class, mappedBy="board", orphanRemoval=true)
     */
    private $favoris;
    public function __construct()
    {
        $this->sujets = new ArrayCollection();
        $this->produitServices = new ArrayCollection();
        $this->moderators = new ArrayCollection();
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

    public function getCategorie(): ?CategorieBoard
    {
        return $this->categorie;
    }

    public function setCategorie(?CategorieBoard $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Sujet[]
     */
    public function getSujets(): Collection
    {
        return $this->sujets;
    }

    public function addSujet(Sujet $sujet): self
    {
        if (!$this->sujets->contains($sujet)) {
            $this->sujets[] = $sujet;
            $sujet->setBoard($this);
        }

        return $this;
    }

    public function removeSujet(Sujet $sujet): self
    {
        if ($this->sujets->removeElement($sujet)) {
            // set the owning side to null (unless already changed)
            if ($sujet->getBoard() === $this) {
                $sujet->setBoard(null);
            }
        }

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
            $produitService->setBoard($this);
        }

        return $this;
    }

    public function removeProduitService(ProduitService $produitService): self
    {
        if ($this->produitServices->removeElement($produitService)) {
            // set the owning side to null (unless already changed)
            if ($produitService->getBoard() === $this) {
                $produitService->setBoard(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Moderator[]
     */
    public function getModerators(): Collection
    {
        return $this->moderators;
    }

    public function addModerator(Moderator $moderator): self
    {
        if (!$this->moderators->contains($moderator)) {
            $this->moderators[] = $moderator;
            $moderator->setBoard($this);
        }

        return $this;
    }

    public function removeModerator(Moderator $moderator): self
    {
        if ($this->moderators->removeElement($moderator)) {
            // set the owning side to null (unless already changed)
            if ($moderator->getBoard() === $this) {
                $moderator->setBoard(null);
            }
        }

        return $this;
    }

    public function getPic(): ?string
    {
        return $this->pic;
    }

    public function setPic(?string $pic): self
    {
        $this->pic = $pic;

        return $this;
    }

    public function getSociete(): ?Societe
    {
        return $this->Societe;
    }

    public function setSociete(?Societe $Societe): self
    {
        $this->Societe = $Societe;

        return $this;
    }
    /**
     * @return Collection|Favoris[]
     */
    public function getFavoris(): Collection
    {
        return $this->favoris;
    }

    public function addFavori(Favoris $favori): self
    {
        if (!$this->favoris->contains($favori)) {
            $this->favoris[] = $favori;
            $favori->setUser($this);
        }

        return $this;
    }

    public function removeFavori(Favoris $favori): self
    {
        if ($this->favoris->removeElement($favori)) {
            // set the owning side to null (unless already changed)
            if ($favori->getUser() === $this) {
                $favori->setUser(null);
            }
        }

        return $this;
    }
    public function Favorised(User $u) : bool
    {    foreach ($this->favoris as $f)
        {
            if($f->getUser() === $u)
            {
                return true;
            }
        }
        return false;
    }
}
