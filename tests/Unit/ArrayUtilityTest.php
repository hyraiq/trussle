<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Utility\ArrayUtility;
use PHPUnit\Framework\TestCase;

class ArrayUtilityTest extends TestCase
{
    public function testArrayFilterReturnsMatchingElements(): void
    {
        $input = [1, 2, 3, 4, 5, 6];
        $result = ArrayUtility::arrayFilter($input, fn(int $n) => $n % 2 === 0);

        $this->assertSame([2, 4, 6], $result);
    }

    public function testArrayFilterReturnsEmptyArrayWhenNoMatches(): void
    {
        $input = [1, 3, 5];
        $result = ArrayUtility::arrayFilter($input, fn(int $n) => $n % 2 === 0);

        $this->assertSame([], $result);
    }

    public function testArrayFilterReindexesArray(): void
    {
        $input = [10 => 'a', 20 => 'b', 30 => 'c'];
        $result = ArrayUtility::arrayFilter($input, fn($v) => $v !== 'b');

        $this->assertSame(['a', 'c'], $result);
        $this->assertSame([0, 1], array_keys($result));
    }

    public function testArrayFindReturnsFirstMatchingElement(): void
    {
        $input = [1, 2, 3, 4, 5, 6];
        $result = ArrayUtility::arrayFind($input, fn(int $n) => $n % 2 === 0);

        $this->assertSame(2, $result);
    }

    public function testArrayFindReturnsNullWhenNoMatch(): void
    {
        $input = [1, 3, 5];
        $result = ArrayUtility::arrayFind($input, fn(int $n) => $n % 2 === 0);

        $this->assertNull($result);
    }

    public function testArrayFindReturnsNullWhenArrayIsEmpty(): void
    {
        $result = ArrayUtility::arrayFind([], fn($n) => true);

        $this->assertNull($result);
    }
}
