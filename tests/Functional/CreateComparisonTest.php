<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class CreateComparisonTest extends BaseWebTestCase
{
    use Factories, ResetDatabase;

    public function testCreateComparison(): void
    {
        $response = $this->doPostRequest('/comparisons', [
            'name' => 'New Hotel Project',
        ]);

        $data = $this->decodeResponse($response);

        $this->assertSame(201, $response->getStatusCode());
        $this->assertArrayHasKey('id', $data);
        $this->assertSame('New Hotel Project', $data['name']);
    }

    public function testCreateComparisonWithoutName(): void
    {
        $response = $this->doPostRequest('/comparisons', []);

        $this->decodeResponse($response);

        $this->assertSame(400, $response->getStatusCode());
    }

    public function testCreateComparisonWithEmptyName(): void
    {
        $response = $this->doPostRequest('/comparisons', [
            'name' => '',
        ]);

        $data = $this->decodeResponse($response);

        $this->assertSame(400, $response->getStatusCode());
    }
}
