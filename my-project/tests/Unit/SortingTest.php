<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SortingTest extends TestCase
{
    public function arraySortingAscProvider()
    {
        return [
            [[7, 1, 8, 12], [1, 7, 8, 12]]
        ];
    }

    /**
     * A array sorting test.
     *
     * @return void
     * @dataProvider arraySortingAscProvider
     */
    public function testArraySortingAsc($givenArray, $expectedArray)
    {
        $this->assertEquals($expectedArray, arraySort($givenArray));
        $this->assertEquals($expectedArray, arraySort($givenArray, ASC));
    }

    public function arraySortingDescProvider()
    {
        return [
            [[7, 1, 8, 12], [12, 8, 7, 1]]
        ];
    }

    /**
     * @param $givenArray
     * @param $expecedArray
     * @return void
     * @dataProvider arraySortingDescProvider
     */
    public function testArraySortingDesc($givenArray, $expectedArray)
    {
        $this->assertEquals($expectedArray, arraySort($givenArray, DESK));
    }

    public function arraySortingExceptionProvider()
    {
        return [
            [[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]]
        ];
    }

    /**
     * @param $givenArray
     * @return void
     * @dataProvider arraySortingExceptionProvider
     */
    public function testArraySortingException($givenArray)
    {
        $this->expectException(\LengthException::class);
        arraySort($givenArray);
    }
}
