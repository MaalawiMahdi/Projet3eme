<?php

namespace App\Entity;

use App\Repository\SujetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Utils;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=SujetRepository::class)
 */
class Sujet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank(message="Titre est obligatoire")
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Description est obligatoire")
     * @Assert\Length(
     *      min = "15",
     *      max = "200",
     *      minMessage = "Votre description doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre description ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $lien_image;

    /**
     * @ORM\ManyToOne(targetEntity=Board::class, inversedBy="Sujet")
     * @ORM\JoinColumn(nullable=false)
     */
    private $board;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="sujet", orphanRemoval=true)
     */
    private $commentaires;

    /**
     * @ORM\OneToMany(targetEntity=Notesujet::class, mappedBy="sujet", orphanRemoval=true)
     */
    private $notesujets;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->notesujets = new ArrayCollection();
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

    public function getBoard(): ?Board
    {
        return $this->board;
    }

    public function setBoard(?Board $board): self
    {
        $this->board = $board;

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
            $commentaire->setSujet($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getSujet() === $this) {
                $commentaire->setSujet(null);
            }
        }
    }

    /**
     * @return Collection|Notesujet[]
     */
    public function getNotesujets(): Collection
    {
        return $this->notesujets;
    }

    public function addNotesujet(Notesujet $notesujet): self
    {
        if (!$this->notesujets->contains($notesujet)) {
            $this->notesujets[] = $notesujet;
            $notesujet->setSujet($this);
        }

        return $this;
    }

    public function removeNotesujet(Notesujet $notesujet): self
    {
        if ($this->notesujets->removeElement($notesujet)) {
            // set the owning side to null (unless already changed)
            if ($notesujet->getSujet() === $this) {
                $notesujet->setSujet(null);
            }
        }

        return $this;
    }
    public function RatedBy(User $u): Bool
    {
        foreach ($this->notesujets as $ns)
        {
            if( $ns->getUser() === $u)
            {
                return true;
            }
        }
        return false;
    }
    public function NotePerso(User $u): int
    {
        foreach ($this->notesujets as $ns)
        {
            if( $ns->getUser() === $u)
            {
                return $ns->getValue();
            }
        }
        return 0;
    }
    public function NoteSujetMoyenne() : int
    {
        $x = 0;
        $nb = 0;
        foreach ($this->notesujets as $ns)
        {
            $nb = $nb + 1;
            $x = $x + $ns->getValue();
        }
        if ($nb != 0)
        {
            $moy = $x / $nb;
            return (round ($moy));
        }
        else {
            return 0;
        }
    }
}
