<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\OneToOne(targetEntity=panier::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $panier;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Livraison::class, inversedBy="commande")
     */
    private $livraison;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPanier(): ?panier
    {
        return $this->panier;
    }

    public function setPanier(panier $panier): self
    {
        $this->panier = $panier;

        return $this;
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
}
