<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ComparisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComparisonRepository::class)]
class Comparison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $name;

    /**
     * @var Collection<int, Vendor>
     */
    #[ORM\OneToMany(targetEntity: Vendor::class, mappedBy: 'comparison', cascade: ['persist', 'remove'])]
    private Collection $vendors;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->vendors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Vendor>
     */
    public function getVendors(): Collection
    {
        return $this->vendors;
    }
}
