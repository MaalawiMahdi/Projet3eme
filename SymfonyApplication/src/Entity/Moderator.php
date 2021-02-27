<?php

namespace App\Entity;

use App\Repository\ModeratorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModeratorRepository::class)
 */
class Moderator
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=board::class, inversedBy="moderators")
     * @ORM\JoinColumn(nullable=false)
     */
    private $board;




    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getBoard(): ?board
    {
        return $this->board;
    }

    public function setBoard(?board $board): self
    {
        $this->board = $board;

        return $this;
    }


}
