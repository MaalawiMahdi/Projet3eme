<?php

namespace App\Entity;

use App\Repository\AideRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\MinLength;


/**
 * @ORM\Entity(repositoryClass=AideRepository::class)
 */
class Aide
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank(message="le champs Titre est obligatoire *"))
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=250)
     * @Assert\NotBlank(message="le champs Description est obligatoire * "))
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Assert\NotBlank(message="le champs adresse est obligatoire * "))
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Assert\NotBlank(message="le champs numero de telephone obligatoire * "))
     * @Assert\Length(min=8,minMessage="votre numero de telephne doit contenir au minimum 8 caractères.",max=15,minMessage="votre numero de telephne ne doit depasser 15 caractères."))
     */
    private $num_tell;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $lien_image;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieAide::class, inversedBy="aides")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

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

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumTell(): ?string
    {
        return $this->num_tell;
    }

    public function setNumTell(?string $num_tell): self
    {
        $this->num_tell = $num_tell;

        return $this;
    }

    public function getLienImage(): ?string
    {
        return $this->lien_image;
    }

    public function setLienImage(?string $lien_image): self
    {
        $this->lien_image = $lien_image;

        return $this;
    }

    public function getCategorie(): ?CategorieAide
    {
        return $this->categorie;
    }

    public function setCategorie(?CategorieAide $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
