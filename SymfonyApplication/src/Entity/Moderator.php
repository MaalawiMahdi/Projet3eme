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
     * @ORM\ManyToOne(targetEntity=user::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=board::class, inversedBy="moderators")
     * @ORM\JoinColumn(nullable=false)
     */
    private $board;




    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

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
