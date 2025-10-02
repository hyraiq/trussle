<?php

namespace App\Factory;

use App\Entity\Vendor;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Vendor>
 */
final class VendorFactory extends PersistentProxyObjectFactory
{
    public static function class(): string
    {
        return Vendor::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'name' => self::faker()->company(),
            'comparison' => ComparisonFactory::new(),
        ];
    }
}
