<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use App\Entity\Comparison;
use App\Entity\Vendor;
use App\Factory\ComparisonFactory;
use App\Factory\VendorFactory;
use App\Utility\ArrayUtility;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;
use function Zenstruck\Foundry\faker;

class ListComparisonsTest extends BaseWebTestCase
{
    use Factories, ResetDatabase;

    public function testListComparisons(): void
    {
        $comparison1 = $this->givenAComparisonWithVendors('Hotel Earthworks');
        $comparison2 = $this->givenAComparisonWithVendors('School Plumbing');

        $response = $this->whenIListComparisons();

        static::assertCount(2, $response);

        $this->thenComparisonExistsInResponse($comparison1, $response);
        $this->thenComparisonExistsInResponse($comparison2, $response);
    }

    private function givenAComparisonWithVendors(string $name): Comparison
    {
        $comparison = ComparisonFactory::createOne(['name' => $name]);

        VendorFactory::createOne([
            'comparison' => $comparison,
            'name'       => faker()->company(),
        ]);

        VendorFactory::createOne([
            'comparison' => $comparison,
            'name'       => faker()->company(),
        ]);

        return $comparison;
    }

    /**
     * @return mixed[]
     */
    private function whenIListComparisons(): array
    {
        $response = $this->doGetRequest('/comparisons');

        return $this->decodeResponse($response);
    }

    /**
     * @param mixed[] $response
     */
    private function thenComparisonExistsInResponse(Comparison $expectedComparison, array $response): void
    {
        $comparisonDetails = ArrayUtility::arrayFind(
            $response,
            fn(mixed $data) => is_array($data) && (($data['id'] ?? null) === $expectedComparison->getId()),
        );

        static::assertIsArray($comparisonDetails);
        static::assertSame($expectedComparison->getId(), $comparisonDetails['id']);
        static::assertSame($expectedComparison->getName(), $comparisonDetails['name']);
    }
}
