<?php

namespace App\Entity;

use App\Repository\AnimalTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimalTypeRepository::class)
 */
class AnimalType
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
     * @ORM\Column(type="integer", options={"unsigned"=true}, length=10)
     */
    private $created;

    /**
     * @ORM\Column(type="integer", options={"unsigned"=true}, length=10)
     */
    private $modified;

    /**
     * @ORM\OneToMany(targetEntity=Pets::class, mappedBy="animalType")
     */
    private $pet;

    public function __construct()
    {
        $this->pet = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Pets>
     */
    public function getPet(): Collection
    {
        return $this->pet;
    }

    public function addPet(Pets $pet): self
    {
        if (!$this->pet->contains($pet)) {
            $this->pet[] = $pet;
            $pet->setAnimalType($this);
        }

        return $this;
    }

    public function removePet(Pets $pet): self
    {
        if ($this->pet->removeElement($pet)) {
            // set the owning side to null (unless already changed)
            if ($pet->getAnimalType() === $this) {
                $pet->setAnimalType(null);
            }
        }

        return $this;
    }
}
