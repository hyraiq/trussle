<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\VendorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VendorRepository::class)]
class Vendor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\ManyToOne(targetEntity: Comparison::class, inversedBy: 'vendors')]
    #[ORM\JoinColumn(nullable: false)]
    private Comparison $comparison;

    public function __construct(Comparison $comparison, string $name)
    {
        $this->comparison = $comparison;
        $this->name = $name;
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

    public function getComparison(): ?Comparison
    {
        return $this->comparison;
    }
}
