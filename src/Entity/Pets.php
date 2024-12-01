<?php

namespace App\Entity;

use App\Repository\PetsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PetsRepository::class)
 * @ORM\HasLifecycleCallbacks
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
     * @Assert\NotBlank
     * @Assert\Type(string)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Type(string)
     */
    private $info;

    /**
     * @ORM\Column(type="integer", options={"unsigned"=true}, length=10)
     * @Assert\NotBlank
     * @Assert\Type(integer)
     */
    private $created;

    /**
     * @ORM\Column(type="integer", options={"unsigned"=true}, length=10)
     * @Assert\NotBlank
     * @Assert\Type(integer)
     */
    private $modified;

    /**
     * @ORM\ManyToOne(targetEntity=AnimalType::class, inversedBy="pet")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     * @Assert\Type(string)
     */
    private $animalType;

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

    public function getAnimalType(): ?AnimalType
    {
        return $this->animalType;
    }

    public function setAnimalType(?AnimalType $animalType): self
    {
        $this->animalType = $animalType;

        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updateTimestamp()
    {
        $date = new \DateTime();

        $this->setModified($date->format('U'));
        if($this->getCreated() == null){
            $this->setCreated($date->format('U'));
        }
    }
}
