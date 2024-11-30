<?php

namespace App\Entity;

use App\Repository\PetsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PetsRepository::class)
 */
class Pets
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned"=true}, unique=true, length=10)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $info;

    /**
     * @ORM\Column(type="integer", options={"unsigned"=true}, length=10)
     */
    private $created;

    /**
     * @ORM\Column(type="integer", options={"unsigned"=true}, length=10)
     */
    private $modified;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(?string $info): self
    {
        $this->info = $info;

        return $this;
    }

    public function getCreated(): ?int
    {
        return $this->created;
    }

    public function setCreated(int $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getModified(): ?int
    {
        return $this->modified;
    }

    public function setModified(int $modified): self
    {
        $this->modified = $modified;

        return $this;
    }
}
