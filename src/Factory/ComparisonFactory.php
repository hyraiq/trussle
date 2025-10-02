<?php

namespace App\Factory;

use App\Entity\Comparison;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Comparison>
 */
final class ComparisonFactory extends PersistentProxyObjectFactory
{
    public static function class(): string
    {
        return Comparison::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'name' => self::faker()->words(3, true),
        ];
    }
}
