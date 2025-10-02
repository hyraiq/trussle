<?php

declare(strict_types=1);

namespace App\Model;

use App\Entity\Comparison;
use App\Entity\Vendor;

final class ComparisonResponse
{
    public readonly ?int $id;

    public readonly string $name;

    public function __construct(Comparison $comparison)
    {
        $this->id   = $comparison->getId();
        $this->name = $comparison->getName();
    }
}
