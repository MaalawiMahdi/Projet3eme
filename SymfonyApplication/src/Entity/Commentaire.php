<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250)
     * @Assert\NotBlank(message="Impossible de laisser un commentaire vide")
     */
    private $com;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="commentaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity=Sujet::class, inversedBy="commentaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sujet;

    /**
     * @ORM\OneToMany(targetEntity=Ld::class, mappedBy="Commentaire", orphanRemoval=true)
     */
    private $lds;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCom(): ?string
    {
        return $this->com;
    }

    public function setCom(string $com): self
    {
        $this->com = $com;

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

    public function getSujet(): ?Sujet
    {
        return $this->sujet;
    }

    public function setSujet(?Sujet $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * @return Collection|Ld[]
     */
    public function getLds(): Collection
    {
        return $this->lds;
    }

    public function addLd(Ld $ld): self
    {
        if (!$this->lds->contains($ld)) {
            $this->lds[] = $ld;
            $ld->setCommentaire($this);
        }

        return $this;
    }

    public function removeLd(Ld $ld): self
    {
        if ($this->lds->removeElement($ld)) {
            // set the owning side to null (unless already changed)
            if ($ld->getCommentaire() === $this) {
                $ld->setCommentaire(null);
            }
        }

        return $this;
    }

    public function isLikedBy(User $u) : bool
    {
        foreach ($this->lds as $l)
        {
            if($l->getUser() === $u && $l->getValue() === 'like')
            {
                return true;
            }
        }
        return false;
    }

    public function isDisLikedBy(User $u) : bool
    {
        foreach ($this->lds as $l)
        {
            if($l->getUser() === $u && $l->getValue() === 'dislike')
            {
                return true;
            }
        }
        return false;
    }

    public function nbLiked() : int
    {
        $nb = 0;
        foreach ($this->lds as $l)
        {
            if($l->getValue() === 'like')
            {
                $nb = $nb+1;
            }
        }
        return $nb;
    }

    public function nbDisliked() : int
    {
        $nb = 0;
        foreach ($this->lds as $l)
        {
            if($l->getValue() === 'dislike')
            {
                $nb = $nb+1;
            }
        }
        return $nb;
    }
}
