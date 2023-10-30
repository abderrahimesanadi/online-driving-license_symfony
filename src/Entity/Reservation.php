<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $res_datetime;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="instructor")
     */
    private $etudiant;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     */
    private $instructor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResDatetime(): ?\DateTimeInterface
    {
        return $this->res_datetime;
    }

    public function setResDatetime(\DateTimeInterface $res_datetime): self
    {
        $this->res_datetime = $res_datetime;

        return $this;
    }

    public function getEtudiant(): ?User
    {
        return $this->etudiant;
    }

    public function setEtudiant(?User $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    public function getInstructor(): ?User
    {
        return $this->instructor;
    }

    public function setInstructor(?User $instructor): self
    {
        $this->instructor = $instructor;

        return $this;
    }
}
