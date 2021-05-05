<?php

namespace App\Entity;

use App\Repository\LikeSneakerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LikeSneakerRepository::class)
 */
class LikeSneaker
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_User;


    /**
     * @ORM\Column(type="date")
     */
    private $publishDate;

    /**
     * @ORM\ManyToOne(targetEntity=Sneaker::class, inversedBy="likeSneakers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sneaker;

    public function __construct(){
        $this->publishDate = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->id_User;
    }

    public function setIdUser(?User $id_User): self
    {
        $this->id_User = $id_User;

        return $this;
    }


    public function getPublishDate(): ?\DateTimeInterface
    {
        return $this->publishDate;
    }

    public function setPublishDate(\DateTimeInterface $publishDate): self
    {
        $this->publishDate = $publishDate;

        return $this;
    }

    public function getSneaker(): ?Sneaker
    {
        return $this->sneaker;
    }

    public function setSneaker(?Sneaker $sneaker): self
    {
        $this->sneaker = $sneaker;

        return $this;
    }
}
