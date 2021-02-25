<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PanierRepository::class)
 *
 */
class Panier
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=ProduitService::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $ProduitService;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="paniers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\Column(type="integer")
     */
    private $qt;





    public function getProduitService(): ?ProduitService
    {
        return $this->ProduitService;
    }

    public function setProduitService(?ProduitService $ProduitService): self
    {
        $this->ProduitService = $ProduitService;

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

    public function getQt(): ?int
    {
        return $this->qt;
    }

    public function setQt(int $qt): self
    {
        $this->qt = $qt;

        return $this;
    }


}
