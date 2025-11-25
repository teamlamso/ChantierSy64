<?php

namespace App\Entity;

use App\Repository\SpecialiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialiteRepository::class)]
class Specialite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $libelle = null;

    /**
     * @var Collection<int, Ouvrier>
     */
    #[ORM\OneToMany(targetEntity: Ouvrier::class, mappedBy: 'specialite')]
    private Collection $ouvriers;

    public function __construct()
    {
        $this->ouvriers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function __toString(): string
    {
        return $this->libelle;
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
            $ouvrier->setSpecialite($this);
        }

        return $this;
    }

    public function removeOuvrier(Ouvrier $ouvrier): static
    {
        if ($this->ouvriers->removeElement($ouvrier)) {
            // set the owning side to null (unless already changed)
            if ($ouvrier->getSpecialite() === $this) {
                $ouvrier->setSpecialite(null);
            }
        }

        return $this;
    }
}
