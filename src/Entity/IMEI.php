<?php

namespace App\Entity;

use App\Repository\IMEIRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: IMEIRepository::class)]
#[UniqueEntity(fields: ['number'], message: 'Ce numéro d\'identification existe déjà')]
class IMEI
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Phone::class, inversedBy: 'imeis')]
    private $phone;

    #[ORM\Column(type: 'string')]
    #[Assert\NotBlank(
        message: 'Vous devez saisir le numéro IMEI',
    )]
    #[Assert\Regex(
        pattern: '/^[0-9]{13}$/',
        message: 'Le format ne corespond pas à un format IMEI (13 chiffres)',
    )]
    private $number;

    #[ORM\Column(type: 'boolean')]
    private $isActive = true;

    public function __toString()
    {
        return $this->number;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhone(): ?Phone
    {
        return $this->phone;
    }

    public function setPhone(?Phone $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function isIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }
}
