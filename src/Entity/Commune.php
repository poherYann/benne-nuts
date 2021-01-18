<?php

namespace App\Entity;

use App\Repository\CommuneRepository;
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
    private $name;

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
     * @ORM\Column(type="integer")
     */
    private $codepostaux;

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

    public function getCodepostaux(): ?int
    {
        return $this->codepostaux;
    }

    public function setCodepostaux(int $codepostaux): self
    {
        $this->codepostaux = $codepostaux;

        return $this;
    }
}
