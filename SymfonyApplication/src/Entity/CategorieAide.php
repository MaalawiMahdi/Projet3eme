<?php

namespace App\Entity;

use App\Repository\CategorieAideRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CategorieAideRepository::class)
 */
class CategorieAide
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="le champs Titre obligatoire *"))
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $lien_icon;

    /**
     * @ORM\OneToMany(targetEntity=Aide::class, mappedBy="categorie", orphanRemoval=true)
     */
    private $aides;

    public function __construct()
    {
        $this->aides = new ArrayCollection();
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
     * @return Collection|Aide[]
     */
    public function getAides(): Collection
    {
        return $this->aides;
    }

    public function addAide(Aide $aide): self
    {
        if (!$this->aides->contains($aide)) {
            $this->aides[] = $aide;
            $aide->setCategorie($this);
        }

        return $this;
    }

    public function removeAide(Aide $aide): self
    {
        if ($this->aides->removeElement($aide)) {
            // set the owning side to null (unless already changed)
            if ($aide->getCategorie() === $this) {
                $aide->setCategorie(null);
            }
        }

        return $this;
    }
    public function __toString()

    {
        return(string) $this->getTitre();
    }

}
