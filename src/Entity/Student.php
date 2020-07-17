<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $FisrtName;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $LastName;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $NumEtud;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFisrtName(): ?string
    {
        return $this->FisrtName;
    }

    public function setFisrtName(string $FisrtName): self
    {
        $this->FisrtName = $FisrtName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getNumEtud(): ?string
    {
        return $this->NumEtud;
    }

    public function setNumEtud(string $NumEtud): self
    {
        $this->NumEtud = $NumEtud;

        return $this;
    }
}
