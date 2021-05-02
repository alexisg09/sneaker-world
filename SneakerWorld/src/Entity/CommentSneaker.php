<?php

namespace App\Entity;

use App\Repository\CommentSneakerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentSneakerRepository::class)
 */
class CommentSneaker
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity=Sneaker::class, inversedBy="comment_sneaker")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_sneaker;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getIdSneaker(): ?Sneaker
    {
        return $this->id_sneaker;
    }

    public function setIdSneaker(?Sneaker $id_sneaker): self
    {
        $this->id_sneaker = $id_sneaker;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }
}
