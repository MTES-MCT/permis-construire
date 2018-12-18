<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReferenceCadastraleRepository")
 * @ORM\Table(name="reference_cadastrale")
 */
class ReferenceCadastrale
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $prefixe;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $section;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $numero;

    /**
     * @ORM\Column(type="float", default=0)
     */
    private $superficie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrefixe(): ?string
    {
        return $this->prefixe;
    }

    public function setPrefixe(string $prefixe): self
    {
        $this->prefixe = $prefixe;

        return $this;
    }

    public function getSection(): ?string
    {
        return $this->section;
    }

    public function setSection(string $section): self
    {
        $this->section = $section;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getSuperficie(): ?float
    {
        return $this->superficie;
    }

    public function setSuperficie(float $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }
}
