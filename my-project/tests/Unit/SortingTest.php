<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SortingTest extends TestCase
{
    public function sortingAscProvider()
    {
        return [
            [[7, 1, -4, 0, 8, 10], [-4, 0, 1, 7, 8, 10]]
        ];
    }

    /**
     * A array sorting test.
     *
     * @return void
     * @dataProvider sortingAscProvider
     */
    public function testSortingAsc($givenArray, $expectedArray)
    {
        $this->assertEquals($expectedArray, arraySort($givenArray));
        $this->assertEquals($expectedArray, arraySort($givenArray, ASC));
    }

    public function sortingDescProvider()
    {
        return [
            [[7, 1, -4, 0, 8, 10], [10, 8, 7, 1, 0, -4]]
        ];
    }

    /**
     * @param $givenArray
     * @param $expecedArray
     * @return void
     * @dataProvider sortingDescProvider
     */
    public function testSortingDesc($givenArray, $expectedArray)
    {
        $this->assertEquals($expectedArray, arraySort($givenArray, DESK));
    }

    public function lengthExceptionProvider()
    {
        return [
            [[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]]
        ];
    }

    /**
     * @param $givenArray
     * @return void
     * @dataProvider lengthExceptionProvider
     */
    public function testLengthException($givenArray)
    {
        $this->expectException(\LengthException::class);
        arraySort($givenArray);
    }

    public function rangeExceptionProvider()
    {
        return [
            [[-11, 0, 5]],
            [[-5, 0, 11]]
        ];
    }

    /**
     * @param $givenArray
     * @return void
     * @dataProvider rangeExceptionProvider
     */
    public function testRangeException($givenArray)
    {
        $this->expectException(\RangeException::class);
        arraySort($givenArray);
    }
}
