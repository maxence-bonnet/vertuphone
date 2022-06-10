<?php

namespace App\Entity;

use App\Repository\PhoneRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PhoneRepository::class)]
class Phone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(
        message: 'Vous devez saisir un nom de modèle',
    )]
    private $model;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank(
        message: 'Vous devez saisir une description',
    )]
    private $description;

    #[ORM\Column(type: 'integer')]
    #[Assert\GreaterThan(
        value: 0,
    )]
    private $limitStock = 0;

    #[ORM\Column(type: 'integer', length: 4, nullable: true)]
    #[Assert\Range(
        min: 1980,
        max: 2050,
        notInRangeMessage: 'L\'année de création est invalide',
    )]
    private $creationYear;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    private $updatedAt;

    #[ORM\ManyToOne(targetEntity: Brand::class, inversedBy: 'phones')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank(
        message: 'Vous devez choisir une marque',
    )]
    private $brand;

    #[ORM\Column(type: 'boolean')]
    private $isActive = true;

    #[ORM\OneToMany(mappedBy: 'phone', targetEntity: IMEI::class, cascade: ['persist'])]
    #[Assert\Valid()]
    private $imeis;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();
        $this->imeis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLimitStock(): ?int
    {
        return $this->limitStock;
    }

    public function setLimitStock(int $limitStock): self
    {
        $this->limitStock = $limitStock;

        return $this;
    }

    public function getCreationYear(): ?string
    {
        return $this->creationYear;
    }

    public function setCreationYear(?string $creationYear): self
    {
        $this->creationYear = $creationYear;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

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

    /**
     * @return Collection<int, IMEI>
     */
    public function getIMEIS(): Collection
    {
        return $this->imeis;
    }

    public function addIMEI(IMEI $imei): self
    {
        if (!$this->imeis->contains($imei)) {
            $this->imeis[] = $imei;
            $imei->setPhone($this);
        }

        return $this;
    }

    public function removeIMEI(IMEI $imei): self
    {
        if ($this->imeis->removeElement($imei)) {
            // set the owning side to null (unless already changed)
            if ($imei->getPhone() === $this) {
                $imei->setPhone(null);
            }
        }

        return $this;
    }
}
