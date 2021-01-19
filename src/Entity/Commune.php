<?php

namespace App\Entity;

use App\Repository\CommuneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommuneRepository::class)
 */
class Commune
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $code;

    /**
     * @ORM\Column(type="integer")
     */
    private $codedepartement;

    /**
     * @ORM\Column(type="integer")
     */
    private $coderegion;

    /**
     * @ORM\OneToMany(targetEntity=CodePostal::class, mappedBy="commune")
     */
    private $codePostals;

    public function __construct()
    {
        $this->codePostals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCodedepartement(): ?int
    {
        return $this->codedepartement;
    }

    public function setCodedepartement(int $codedepartement): self
    {
        $this->codedepartement = $codedepartement;

        return $this;
    }

    public function getCoderegion(): ?int
    {
        return $this->coderegion;
    }

    public function setCoderegion(int $coderegion): self
    {
        $this->coderegion = $coderegion;

        return $this;
    }

    /**
     * @return Collection|CodePostal[]
     */
    public function getCodePostals(): Collection
    {
        return $this->codePostals;
    }

    public function addCodePostal(CodePostal $codePostal): self
    {
        if (!$this->codePostals->contains($codePostal)) {
            $this->codePostals[] = $codePostal;
            $codePostal->setCommune($this);
        }

        return $this;
    }

    public function removeCodePostal(CodePostal $codePostal): self
    {
        if ($this->codePostals->removeElement($codePostal)) {
            // set the owning side to null (unless already changed)
            if ($codePostal->getCommune() === $this) {
                $codePostal->setCommune(null);
            }
        }

        return $this;
    }

}
