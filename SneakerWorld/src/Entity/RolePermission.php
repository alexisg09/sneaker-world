<?php

namespace App\Entity;

use App\Repository\RolePermissionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RolePermissionRepository::class)
 */
class RolePermission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Permission::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_permission;

    /**
     * @ORM\OneToOne(targetEntity=Role::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_role;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPermission(): ?Permission
    {
        return $this->id_permission;
    }

    public function setIdPermission(?Permission $id_permission): self
    {
        $this->id_permission = $id_permission;

        return $this;
    }

    public function getIdRole(): ?Role
    {
        return $this->id_role;
    }

    public function setIdRole(Role $id_role): self
    {
        $this->id_role = $id_role;

        return $this;
    }
}
