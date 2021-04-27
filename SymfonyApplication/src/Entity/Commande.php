<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     * @Assert\GreaterThan(
     *     value = 0
     * )
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Livraison::class, inversedBy="commande")
     */
    private $livraison;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=ProdutiCommande::class, mappedBy="commande")
     */
    private $produtiCommandes;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $Adresse;



    public function __construct()
    {
        $this->produtiCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getLivraison(): ?Livraison
    {
        return $this->livraison;
    }

    public function setLivraison(?Livraison $livraison): self
    {
        $this->livraison = $livraison;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|ProdutiCommande[]
     */
    public function getprodutiCommandes(): Collection
    {
        return $this->produtiCommandes;
    }

    public function addprodutiCommandes(ProdutiCommande $produtiCommandes): self
    {
        if (!$this->produtiCommandes->contains($produtiCommandes)) {
            $this->produtiCommandes[] = $produtiCommandes;
            $produtiCommandes->setCommande($this);
        }

        return $this;
    }

    public function removeprodutiCommandes(ProdutiCommande $produtiCommandes): self
    {
        if ($this->produtiCommandes->removeElement($produtiCommandes)) {
            // set the owning side to null (unless already changed)
            if ($produtiCommandes->getCommande() === $this) {
                $produtiCommandes->setCommande(null);
            }
        }

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(?string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }


}
