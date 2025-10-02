<?php

namespace App\DataFixtures;

use App\Factory\ComparisonFactory;
use App\Factory\VendorFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use function Zenstruck\Foundry\faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Comparison with vendors
        $comparison1 = ComparisonFactory::createOne(['name' => 'Hotel Earthworks Package']);
        VendorFactory::createMany(3, [
            'comparison' => $comparison1,
        ]);

        // Empty comparison
        $comparison2 = ComparisonFactory::createOne(['name' => 'School Plumbing Tender']);
    }
}
