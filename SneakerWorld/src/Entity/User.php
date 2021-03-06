<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Password;

    /**
     * @ORM\OneToMany(targetEntity=CommentSneaker::class, mappedBy="id_user")
     */
    private $comment_sneaker;

    /**
     * @ORM\Column(type="string")
     */
    private $roles = 'ROLE_USER';


    public function __construct()
    {
        $this->comment_sneaker = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(?string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(?string $Password): self
    {
        $this->Password = $Password;

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
            $commentSneaker->setIdUser($this);
        }

        return $this;
    }

    public function removeCommentSneaker(CommentSneaker $commentSneaker): self
    {
        if ($this->comment_sneaker->removeElement($commentSneaker)) {
            // set the owning side to null (unless already changed)
            if ($commentSneaker->getIdUser() === $this) {
                $commentSneaker->setIdUser(null);
            }
        }

        return $this;
    }

    public function getRoles()
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $role = [];
        $role[] = $roles;

        return array_unique($role);

    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }


}
