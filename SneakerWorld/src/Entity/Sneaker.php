<?php

namespace App\Entity;

use App\Repository\SneakerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity(repositoryClass=SneakerRepository::class)
 */
class Sneaker
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datePublish;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleur;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=CommentSneaker::class, mappedBy="id_sneaker")
     */
    private $comment_sneaker;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=LikeSneaker::class, mappedBy="sneaker", orphanRemoval=true)
     */
    private $likeSneakers;

    public function __construct()
    {
        $this->comment_sneaker = new ArrayCollection();
        $this->likeSneakers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePublish(): ?\DateTimeInterface
    {
        return $this->datePublish;
    }

    public function setDatePublish(?\DateTimeInterface $datePublish): self
    {
        $this->datePublish = $datePublish;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }


    public function getMarque(): ?string
    {
        return $this->Marque;
    }

    public function setMarque(?string $Marque): self
    {
        $this->Marque = $Marque;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|CommentSneaker[]
     */
    public function getCommentSneaker(): Collection
    {
        return $this->comment_sneaker;
    }

    public function addCommentSneaker(CommentSneaker $commentSneaker): self
    {
        if (!$this->comment_sneaker->contains($commentSneaker)) {
            $this->comment_sneaker[] = $commentSneaker;
            $commentSneaker->setIdSneaker($this);
        }

        return $this;
    }

    public function removeCommentSneaker(CommentSneaker $commentSneaker): self
    {
        if ($this->comment_sneaker->removeElement($commentSneaker)) {
            // set the owning side to null (unless already changed)
            if ($commentSneaker->getIdSneaker() === $this) {
                $commentSneaker->setIdSneaker(null);
            }
        }

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|LikeSneaker[]
     */
    public function getLikeSneakers(): Collection
    {
        return $this->likeSneakers;
    }

    public function addLikeSneaker(LikeSneaker $likeSneaker): self
    {
        if (!$this->likeSneakers->contains($likeSneaker)) {
            $this->likeSneakers[] = $likeSneaker;
            $likeSneaker->setSneaker($this);
        }

        return $this;
    }

    public function removeLikeSneaker(LikeSneaker $likeSneaker): self
    {
        if ($this->likeSneakers->removeElement($likeSneaker)) {
            // set the owning side to null (unless already changed)
            if ($likeSneaker->getSneaker() === $this) {
                $likeSneaker->setSneaker(null);
            }
        }

        return $this;
    }
}
