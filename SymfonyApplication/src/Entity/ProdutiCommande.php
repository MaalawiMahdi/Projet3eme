<?php

namespace App\Entity;

use App\Repository\ProdutiCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProdutiCommandeRepository::class)
 * @ORM\Table(name="ProdutiCommandeRepository",
 *     uniqueConstraints={
 *     @ORM\UniqueConstraint(name="Produit_commande", columns={"produitservice_id", "commande_id"})}
 *     )
 */
class ProdutiCommande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Commande::class, inversedBy="produtiCommande")
     */
    private $Commande;

    /**
     * @ORM\ManyToOne(targetEntity=ProduitService::class, inversedBy="produtiCommandes")
     */
    private $produitservice;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommande(): ?Commande
    {
        return $this->Commande;
    }

    public function setCommande(?commande $Commande): self
    {
        $this->Commande = $Commande;

        return $this;
    }

    public function getProduitservice(): ?produitservice
    {
        return $this->produitservice;
    }

    public function setProduitservice(?produitservice $produitservice): self
    {
        $this->produitservice = $produitservice;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }
}
