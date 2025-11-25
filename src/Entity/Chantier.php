<?php

namespace App\Entity;

use App\Repository\ChantierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChantierRepository::class)]
class Chantier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $localisation = null;

    #[ORM\Column(length: 100)]
    private ?string $description = null;

    /**
     * @var Collection<int, Ouvrier>
     */
    #[ORM\ManyToMany(targetEntity: Ouvrier::class, inversedBy: 'chantiers')]
    private Collection $ouvriers;

    public function __construct()
    {
        $this->ouvriers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): static
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Ouvrier>
     */
    public function getOuvriers(): Collection
    {
        return $this->ouvriers;
    }

    public function addOuvrier(Ouvrier $ouvrier): static
    {
        if (!$this->ouvriers->contains($ouvrier)) {
            $this->ouvriers->add($ouvrier);
        }

        return $this;
    }

    public function removeOuvrier(Ouvrier $ouvrier): static
    {
        $this->ouvriers->removeElement($ouvrier);

        return $this;
    }
}
