<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BLOB)]
    private $imageData;

    /**
     * @var Collection<int, habitat>
     */
    #[ORM\OneToMany(targetEntity: habitat::class, mappedBy: 'image')]
    private Collection $habitat;

    public function __construct()
    {
        $this->habitat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageData()
    {
        return $this->imageData;
    }

    public function setImageData($imageData): static
    {
        $this->imageData = $imageData;

        return $this;
    }

    /**
     * @return Collection<int, habitat>
     */
    public function getHabitat(): Collection
    {
        return $this->habitat;
    }

    public function addHabitat(habitat $habitat): static
    {
        if (!$this->habitat->contains($habitat)) {
            $this->habitat->add($habitat);
            $habitat->setImage($this);
        }

        return $this;
    }

    public function removeHabitat(habitat $habitat): static
    {
        if ($this->habitat->removeElement($habitat)) {
            // set the owning side to null (unless already changed)
            if ($habitat->getImage() === $this) {
                $habitat->setImage(null);
            }
        }

        return $this;
    }
}
