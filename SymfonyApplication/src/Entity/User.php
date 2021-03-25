<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=72)
     * @Assert\Length(
     *      min = 4,
     *      max = 16,
     *      minMessage = "Your password must be at least {{ limit }} characters long",
     *      maxMessage = "Your passowrd cannot be longer than {{ limit }} characters",
     *      allowEmptyString = false
     * )
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Email(message = "The email '{{ value }}' is not a valid email.")
     */
    private $mail;

    /**
     * @ORM\OneToOne(targetEntity=Societe::class, mappedBy="Useraccount", cascade={"persist", "remove"})
     */
    private $Societe;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="User", orphanRemoval=true)
     */
    private $commentaires;

    /**
     * @ORM\OneToMany(targetEntity=Panier::class, mappedBy="User", orphanRemoval=true)
     */
    private $paniers;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ban;

    /**
     * @ORM\OneToOne(targetEntity=InformationsSupplementaires::class, mappedBy="User", cascade={"persist", "remove"})
     */
    private $informationsSupplementaires;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->paniers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getSociete(): ?Societe
    {
        return $this->Societe;
    }

    public function setSociete(Societe $Societe): self
    {
        // set the owning side of the relation if necessary
        if ($Societe->getUseraccount() !== $this) {
            $Societe->setUseraccount($this);
        }

        $this->Societe = $Societe;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setUser($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getUser() === $this) {
                $commentaire->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Panier[]
     */
    public function getPaniers(): Collection
    {
        return $this->paniers;
    }

    public function addPanier(Panier $panier): self
    {
        if (!$this->paniers->contains($panier)) {
            $this->paniers[] = $panier;
            $panier->setUser($this);
        }

        return $this;
    }

    public function removePanier(Panier $panier): self
    {
        if ($this->paniers->removeElement($panier)) {
            // set the owning side to null (unless already changed)
            if ($panier->getUser() === $this) {
                $panier->setUser(null);
            }
        }

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getBan(): ?bool
    {
        return $this->ban;
    }

    public function setBan(bool $ban): self
    {
        $this->ban = $ban;

        return $this;
    }

    public function getInformationsSupplementaires(): ?InformationsSupplementaires
    {
        return $this->informationsSupplementaires;
    }

    public function setInformationsSupplementaires(InformationsSupplementaires $informationsSupplementaires): self
    {
        // set the owning side of the relation if necessary
        if ($informationsSupplementaires->getUser() !== $this) {
            $informationsSupplementaires->setUser($this);
        }

        $this->informationsSupplementaires = $informationsSupplementaires;

        return $this;
    }
}
